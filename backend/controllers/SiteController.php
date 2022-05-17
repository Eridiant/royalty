<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use backend\models\UserActivity;
use backend\models\UserIp;
use backend\models\DataStat;
use backend\models\DayStat;
use backend\models\PageChart;
use backend\models\PageByDay;
use backend\models\UserChart;
use backend\models\UserNew;
use frontend\models\SxGeo;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'statistics', 'stasis'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionStasis()
    {
        $prefLang = UserIp::find()
        ->where(['not', ['preferred_lang_all' => null]])
        ->andWhere(['preferred_lang'=> null])
        ->all();

        foreach ($prefLang as $value) {
            if ($value->preferred_lang_all !== null) {
                $value->preferred_lang = substr($value->preferred_lang_all, 0, 2);
                $value->save();
            }
        }
    }

    public function actionStatistics()
    {
        $userIp = UserIp::find()->all();

        if (is_null($userIp[0])) {
            return $this->render('statistics');
        }

        // $prefLang = UserIp::find()
        //     ->where(['not', ['preferred_lang_all' => null]])
        //     ->andWhere(['preferred_lang'=> null])
        //     ->all();

        // foreach ($prefLang as $value) {
        //     if ($value->preferred_lang_all !== null) {
        //         $value->preferred_lang = substr($value->preferred_lang_all, 0, 2);
        //         $value->save();
        //     }
        // }

        $dayStat = DayStat::find()->orderBy(['id'=> SORT_DESC])->one();
        if (is_null($dayStat)) {
            $startInterval = intval(floor($userIp[0]["created_at"] / (3600 * 24)) * 3600 * 24);
        } else {
            $startInterval = $dayStat["date"] + 3600 * 24;
        }
        $dayStat = new DayStat();

        $endInterval = $startInterval + (3600 * 24) - 1;
        $countModel = UserActivity::find();
        $interrupt = false;
        // foreach ($countModel->asArray()->all() as $value) {
        //     var_dump('<pre>');
        //     var_dump(\Yii::$app->formatter->asDate($value["created_at"], "php:Y-m-d H:i:s"), $value);
        //     var_dump('</pre>');
        // }
        // die;

        while ($endInterval < intval(date('U')) && !$interrupt) {

            $users = $this->countUsers($startInterval, $endInterval, $countModel);
            $pages = $this->countPages($startInterval, $endInterval, $countModel);
            $newUsers = $this->countNewUsers($startInterval, $endInterval);

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $dayStat->year = \Yii::$app->formatter->asDate($startInterval, "php:Y");
                $dayStat->month = \Yii::$app->formatter->asDate($startInterval, "php:m");
                $dayStat->day = \Yii::$app->formatter->asDate($startInterval, "php:d");
                $dayStat->date = $startInterval;
                $dayStat->save();

                $userChart = new UserChart();
                $userChart->user = $users;
                $userChart->link('data', $dayStat);

                $userNew = new UserNew();
                $userNew->user = $newUsers;
                $userNew->link('data', $dayStat);

                $pageByDay = new PageByDay();
                $pageByDay->page = $pages;
                $pageByDay->link('data', $dayStat);

                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                $interrupt = true;
                throw $e;
            }

            $startInterval += 3600 * 24;
            $endInterval = $startInterval + (3600 * 24) - 1;
            $dayStat = new DayStat();
        }

        // page stat
        $dataStat = DataStat::find()->orderBy(['id'=> SORT_DESC])->one();
        if (is_null($dataStat)) {
            $startInterval = intval(floor($userIp[0]["created_at"] / 3600) * 3600);
        } else {
            // $startInterval = intval(floor($dataStat["date"] / (3600 * 24)) * 3600 * 24);
            $startInterval = $dataStat["date"] + 3600;
        }
        $dataStat = new DataStat();

        $endInterval = $startInterval + 3600 - 1;
        $countModel = UserActivity::find();
        $interrupt = false;

        while ($endInterval < intval(date('U')) && !$interrupt) {
            // var_dump(\Yii::$app->formatter->asDate($startInterval, "php:Y-m-d H:i:s"));
            
            // $pages = $this->countUsers($startInterval, $endInterval, $countModel);
            $pages = $this->countPages($startInterval, $endInterval, $countModel);

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $dataStat->year = \Yii::$app->formatter->asDate($startInterval, "php:Y");
                $dataStat->month = \Yii::$app->formatter->asDate($startInterval, "php:m");
                $dataStat->day = \Yii::$app->formatter->asDate($startInterval, "php:d");
                $dataStat->hour = \Yii::$app->formatter->asDate($startInterval, "php:H");
                $dataStat->date = $startInterval;
                $dataStat->save();

                $page = new PageChart();
                $page->page = $pages;
                $page->link('data', $dataStat);

                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                $interrupt = true;
                throw $e;
            }

            // var_dump('<pre>');
            // var_dump($dayStat);
            // var_dump('</pre>');
            // die;
            
            $startInterval += 3600;
            $endInterval = $startInterval + 3600 - 1;
            $dataStat = new dataStat();
        }

        // IP
        $UserIps = UserIp::find()->where(['checked'=> null])->all();
        foreach ($UserIps as $UsIp) {
            $country = $this->geoCity(long2ip($UsIp->ip));
            // $country = $this->geoCity('185.28.110.65');
            // var_dump('<pre>');
            // var_dump($country,$UsIp);
            // var_dump('</pre>');
            // die;
            
            if (isset($UsIp)) {
                if ($country) {
                    $UsIp->country = $country["country"]["name_ru"];
                    $UsIp->region = $country["region"]["name_ru"];
                    $UsIp->city = $country["city"]["name_ru"];
                    $UsIp->code = $country["country"]["iso"];
                }
                $UsIp->preferred_lang = substr($UsIp->preferred_lang_all, 0, 2);
                $UsIp->checked = 1;
                // $UsIp->save();
                if (!$UsIp->save()) {
                    var_dump($UsIp->getErrors());
                }
            }
        }

        // VIEW

        $countries = UserIp::find()
            ->select(['country', 'COUNT(*) AS cnt'])
            ->where(['!=', 'country', ""])
            ->groupBy(['country'])
            ->orderBy(['cnt' => SORT_DESC])
            ->limit(5)
            ->asArray()
            ->all();

        $languages = UserActivity::find()
            ->select(['lang', 'COUNT(*) AS cnt'])
            // ->where('approved = 1')
            ->groupBy(['lang'])
            ->orderBy(['cnt' => SORT_DESC])
            ->asArray()
            ->all();

        $languagesPref = UserIp::find()
            ->select(['preferred_lang', 'COUNT(*) AS cnt'])
            ->where(['not', ['preferred_lang' => null]])
            ->groupBy(['preferred_lang'])
            ->orderBy(['cnt' => SORT_DESC])
            ->limit(5)
            ->asArray()
            ->all();

        $country = [];
        $countryLabels = [];
        foreach ($countries as $countr) {
            $country[] = $countr["cnt"];
            $countryLabels[] = $countr["country"];
        }
        $lang = [];
        $langLabels = [];
        foreach ($languages as $langu) {
            $lang[] = $langu["cnt"];
            $langLabels[] = $langu["lang"];
        }
        $langPref = [];
        $langPrefLabels = [];
        foreach ($languagesPref as $langp) {
            $langPref[] = $langp["cnt"];
            $langPrefLabels[] = $langp["preferred_lang"];
        }

        $intr = intval(date('U')) - 3600 * 24 * 30;
        $dayStats = DayStat::find()
            ->with(['userChart', 'userNew', 'pageByDay'])
            ->where(['>=', 'date', $intr])
            // ->select('date')
            // ->asArray()
            ->all();

        $intr = intval(date('U')) - 3600 * 24 * 2;

        $dataStats = DataStat::find()
            ->with(['pageChart'])
            ->where(['>=', 'date', $intr])
            // ->select('date')
            // ->asArray()
            ->all();
            $users = [];
            $pageByDay = [];
            $newUsers = [];
            $usersLabels = [];
            $pages = [];
            $pagesLabels = [];

        foreach ($dayStats as $day) {
            $users[] = $day->userChart->user;
            $pageByDay[] = $day->pageByDay->page;
            $newUsers[] = $day->userNew->user;
            $usersLabels[] = $day->day;
        }
        foreach ($dataStats as $data) {
            $pages[] = $data->pageChart->page;
            $pagesLabels[] = $data->hour;
        }
        return $this->render('statistics', compact('dayStats', 'dataStats', 'users', 'newUsers', 'pageByDay', 'usersLabels', 'pages', 'pagesLabels', 'country', 'lang', 'countryLabels', 'langLabels', 'langPrefLabels', 'langPref'));
    }

    private function geoCity($ip)
    {
        $country = new SxGeo(Yii::getAlias('@webroot') . '/dat/SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);

        return $country->getCityFull($ip);
    }

    private function countUniqPages($startInterval, $endInterval, $countModel)
    {
        $query = $countModel
                // ->select(['user_id'])
                ->where(['between', 'created_at', $startInterval, $endInterval])
                ->select(['user_id', 'url'])
                ->distinct()
                ->count();
        return $query;
    }

    private function countPages($startInterval, $endInterval, $countModel)
    {
        $query = $countModel
                // ->select(['user_id'])
                ->where(['between', 'created_at', $startInterval, $endInterval])
                ->select(['id'])
                ->count();
        return $query;
    }

    private function countUsers($startInterval, $endInterval, $countModel)
    {
        $query = $countModel
                // ->select(['user_id'])
                ->where(['between', 'created_at', $startInterval, $endInterval])
                ->select(['user_id'])
                ->distinct()
                ->count();
        return $query;
    }

    private function countNewUsers($startInterval, $endInterval)
    {
        $num = UserIp::find()
                ->where(['between', 'created_at', $startInterval, $endInterval])
                ->select(['user_id'])
                ->count();
        return $num;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

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
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
