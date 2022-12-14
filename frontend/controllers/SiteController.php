<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\Callback;
use frontend\models\Floor;
use frontend\models\Flat;
use frontend\models\ContactForm;
use frontend\models\SxGeo;
use frontend\models\UserIp;
use frontend\models\UserActivity;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public $bodyClass;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['get', 'post'],
                ],
            ],
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index', 'infrastructure', 'contacts', 'gallery', 'construction', 'batumy'],
                'duration' => 3600 * 24 * 365,
                'enabled' => Yii::$app->user->isGuest,
                'dependency' => [
                    'class' => 'yii\caching\TagDependency',
                    'tags' => 'translate',
                ],
                'variations' => [
                    Yii::$app->language,
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales'=> \yii\helpers\ArrayHelper::getColumn(\backend\modules\language\models\Language::find()->select('key')->asArray()->all(), 'key'),
            ]
        ];
    }

    public function beforeAction($action)
    {
        $request = Yii::$app->request;
        $ip = ip2long($request->userIP);
        if ($ip === 3105648193 || $request->pathInfo === 'site/set-locale' || !Yii::$app->user->isGuest ) {
            return parent::beforeAction($action);
        }
        

        // $code = $this->country($request->userIP);

        
        try {
            $userIp = UserIp::find()->where(['ip' => $ip])->one();
            if ($userIp === null) {
                $userIp = new UserIp();
                $userIp->ip = $ip;
                // $userIp->ip = $ip;
                // $userIp->ip = $ip;
                if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                    $list = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);
                    $userIp->preferred_lang_all = $list;
                    if ($list = substr($value->preferred_lang_all, 0, 2)) {
                        $userIp->preferred_lang = $list;
                    }
                }
                $userIp->save();
            }

            // var_dump($userIp->getErrors());
            $userAct = new UserActivity();
            $userAct->url = $request->pathInfo;
            
            // if (isset($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'], $request->serverName) === false)) {
            if (isset($_SERVER['HTTP_REFERER'])) {
                $userAct->ref = $_SERVER['HTTP_REFERER'];
            }
            $userAct->device = trim($_SERVER['HTTP_USER_AGENT']);
            $userAct->lang = Yii::$app->language;
            // $userAct->created_at = time();
            $userAct->link('user', $userIp);
        }
        catch (\yii\db\Exception $exception) {
            echo '??????????';
        }
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        

        // if ($userIp->getErrors()) {
        //     var_dump($userIp->getErrors());die;
        // }

        

        return parent::afterAction($action, $result);
    }

    // public function afterRender($viewFile, $params, &$output)
    // {
    //     $request = Yii::$app->request;
    //     $ip = ip2long($request->userIP);
    //     $code = $this->country($request->userIP);

    //     $userIp = UserIp::find()->where(['ip' => $ip])->one();
    //     if ($userIp === null) {
    //         $userIp = new UserIp();
    //         $userIp->ip = $ip;
    //         $userIp->code = $this->country($request->userIP);
    //         $userIp->created_at = time();
    //         $userIp->save();
    //     }

    //     if ($userIp->getErrors()) {
    //         var_dump($userIp->getErrors());die;
    //     }

    //     $userAct = new UserActivity();
    //     $userAct->url = $_SERVER['REQUEST_URI'];
    //     $userAct->created_at = time();
    //     $userAct->link('user', $userIp);
    //     parent::afterRender($viewFile, $params, $output);
    // }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->bodyClass = 'index white';

        return $this->render('index');
    }

    private function country($ip)
    {
        $country = new SxGeo(Yii::getAlias('@webroot') . '/dat/SxGeo.dat', SXGEO_BATCH | SXGEO_MEMORY);

        return $country->getCountry($ip);
    } 

    public function actionCallback()
    {

        $model = new Callback();

        $request = Yii::$app->request;

        // if ($request->isPost && $model->load($request->post())) {
        if ($request->isPost) {

            $model->lang = Yii::$app->language;
            $model->name = $request->post('name');
            $model->phone = $request->post('phone');
            $model->country = $this->country($request->userIP);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            
            // if($model->save()){
            //     return $this->renderPartial('_success');
            //     return ['data' => ['success' => true]];
            // }

            if($model->save()){
                Yii::$app->mailer->compose('mail', ['name' => $request->post('name'), 'phone' => $request->post('phone')])
                // Yii::$app->mailer->compose()
                    // ->setTo($mail['email'])
                    ->setTo('zdvxfb@mail.ru')
                    ->setFrom('calligraphy@calligraphy-batumi.com')
                    ->setSubject('????????????')
                    // ->setHtmlBody(
                    //     "<table style='width: 100%;'>
                    //         <tr style='background-color: #f8f8f8;'>
                    //             <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????:</b></td>
                    //             <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$request->post('name')}</td>
                    //         </tr>
                    //         <tr style='background-color: #f8f8f8;'>
                    //             <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????????????:</b></td>
                    //             <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$request->post('phone')}</td>
                    //         </tr>
                    //     </table>")
                    ->send();
                return ['data' => ['success' => true]];
            }

            return ['data' => ['success' => false]];
        }

        if ($model->getErrors()) {
            var_dump($model->getErrors());
            die;
        }

        return $this->render('index');
    }

    public function actionFloor()
    {

        $request = Yii::$app->request;

        if ($request->isPost) {

            // $model = Floor::findOne(['id' => $request->post('floor')]);
            $model = Flat::find()
                    ->select(['floor_id', 'num', 'status', 'total_area', 'living_space', 'balcony_area'])
                    ->where('floor_id=:floor_id')
                    ->addParams([':floor_id' => $request->post('floor')])
                    ->asArray()
                    ->all();
            $mod = $request->post('floor') % 23;
            
            $files = \yii\helpers\FileHelper::findFiles("images/flat/{$mod}");
            $rend = $this->renderPartial('_floor', compact('files'));
            
            
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['data' => ['rend' => $rend, 'model' => $model]];
            // return $this->renderAjax('_floor', compact('model'));
            // return $this->renderAjax('_success');
        }



        return 1;
    }

    public function actionFlat()
    {

        $request = Yii::$app->request;
        $flat = $request->post('flat');
        // $files = \yii\helpers\FileHelper::findFiles("/frontend/web/images/del/flat/${flat}");
        $files = \yii\helpers\FileHelper::findFiles("images/flat/${flat}");
        // foreach (new DirectoryIterator($this->path) as $item) {
        //     array_push($fls, $item->getFilename());
        // }
        // var_dump('<pre>');
        // var_dump($files);
        // var_dump('</pre>');
        // die;
        
        return $this->renderPartial('_flat', compact('files'));

        if ($request->isPost) {

            $model = Flat::findOne(['id' => $id]);

            return $this->renderAjax('_flat');
        }

        return 1;
    }

    /**
     * Displays plans page.
     *
     * @return mixed
     */
    public function actionPlans()
    {
        $this->bodyClass = 'plans-page';
        return $this->render('plans');
    }

    public function actionPdf()
    {
        $request = Yii::$app->request;
        $floor = $request->get('floor');
        $flat = $request->get('flat');
        $imgs = $request->get('img');
        $imgs = $imgs % 23;

        // ?block=a&floor=11&flat=1
        // $model='';

        $model = Flat::find()
                ->where('floor_id=:floor_id')
                ->addParams([':floor_id' => $floor])
                ->andWhere('num=:num')
                ->addParams([':num' => $flat])
                ->exists();
                
        $img = \yii\helpers\FileHelper::findFiles("images/flat/{$imgs}")[0];
        if (!$model || !$img) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }


        // $img = "????20.jpg";

        $this->bodyClass = 'other bl';

        return $this->renderPartial('pdf', compact('floor', 'flat', 'img', 'imgs'));
    }

    /**
     * Displays contacts page.
     *
     * @return mixed
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    // public function actionAbout()
    // {
    //     return $this->render('about');
    // }

    public function actionPrivacyPolicy()
    {

        $this->bodyClass = 'privacy';

        return $this->render('policy');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionGallery()
    {
        $rend = 'gallery';
        return $this->render('gallery', compact('rend'));
    }

    public function actionConstruction()
    {
        $rend = 'construction';
        return $this->render('gallery', compact('rend'));
    }

    public function actionBatumy()
    {
        $rend = 'batumy';
        return $this->render('gallery', compact('rend'));
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionInfrastructure()
    {
        return $this->render('infrastructure');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
    //             Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
    //         } else {
    //             Yii::$app->session->setFlash('error', 'There was an error sending your message.');
    //         }

    //         return $this->refresh();
    //     }

    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    // public function actionSignup()
    // {
    //     $model = new SignupForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->signup()) {
    //         Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
    //         return $this->goHome();
    //     }

    //     return $this->render('signup', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    // public function actionRequestPasswordReset()
    // {
    //     $model = new PasswordResetRequestForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         if ($model->sendEmail()) {
    //             Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

    //             return $this->goHome();
    //         }

    //         Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
    //     }

    //     return $this->render('requestPasswordResetToken', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    // public function actionResetPassword($token)
    // {
    //     try {
    //         $model = new ResetPasswordForm($token);
    //     } catch (InvalidArgumentException $e) {
    //         throw new BadRequestHttpException($e->getMessage());
    //     }

    //     if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
    //         Yii::$app->session->setFlash('success', 'New password saved.');

    //         return $this->goHome();
    //     }

    //     return $this->render('resetPassword', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    // public function actionVerifyEmail($token)
    // {
    //     try {
    //         $model = new VerifyEmailForm($token);
    //     } catch (InvalidArgumentException $e) {
    //         throw new BadRequestHttpException($e->getMessage());
    //     }
    //     if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
    //         Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
    //         return $this->goHome();
    //     }

    //     Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
    //     return $this->goHome();
    // }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    // public function actionResendVerificationEmail()
    // {
    //     $model = new ResendVerificationEmailForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         if ($model->sendEmail()) {
    //             Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
    //             return $this->goHome();
    //         }
    //         Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
    //     }

    //     return $this->render('resendVerificationEmail', [
    //         'model' => $model
    //     ]);
    // }
}
