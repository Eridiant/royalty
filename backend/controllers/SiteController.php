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
                        'actions' => ['logout', 'index', 'statistics'],
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

    public function actionStatistics()
    {
        $userIp = UserIp::find()->all();

        if (is_null($userIp[0])) {
            return $this->render('statistics');
        }

        $dayStat = DayStat::find()->orderBy(['id'=> SORT_DESC])->one();
        if (is_null($dayStat)) {
            $dayStat = new DayStat();
            $startInterval = intval(floor($userIp[0]["created_at"] / (3600 * 24)) * 3600 * 24);
        } else {
            // $startInterval = intval(floor($dayStat["date"] / (3600 * 24)) * 3600 * 24);
            $startInterval = $dayStat["date"] + 3600 * 24;
        }

        $endInterval = $startInterval + (3600 * 24) - 1;
        $countModel = UserActivity::find();
        $interrupt = false;
        // var_dump('<pre>');
        // var_dump(
        //     \Yii::$app->formatter->asDate($startInterval, "php:Y-m-d H:i:s"),
        //     \Yii::$app->formatter->asDate($endInterval, "php:Y-m-d H:i:s"),
        //     $endInterval,
        //     \Yii::$app->formatter->asDate(date('U'), "php:Y-m-d H:i:s"),
        //     intval(date('U')),
        //     $endInterval < intval(date('U'))
        // );
        // var_dump('</pre>');
        // die;
        

        while ($endInterval < intval(date('U')) && !$interrupt) {
            // var_dump('<pre>');
            // var_dump(
            //     \Yii::$app->formatter->asDate($startInterval, "php:Y-m-d H:i:s"),
            //     \Yii::$app->formatter->asDate($endInterval, "php:Y-m-d H:i:s"),
            //     $endInterval,
            //     \Yii::$app->formatter->asDate(date('U'), "php:Y-m-d H:i:s"),
            //     intval(date('U')),
            //     $endInterval < intval(date('U'))
            // );
            // var_dump('</pre>');
            $users = $this->countUsers($startInterval, $endInterval, $countModel);
            $pages = $this->countUsers($startInterval, $endInterval, $countModel);
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

            // var_dump('<pre>');
            // var_dump($dayStat);
            // var_dump('</pre>');
            // die;
            
            $startInterval += 3600 * 24;
            $endInterval = $startInterval + (3600 * 24) - 1;
            $dayStat = new DayStat();
        }

        // page stat
        $dataStat = DataStat::find()->orderBy(['id'=> SORT_DESC])->one();
        if (is_null($dataStat)) {
            $dataStat = new DataStat();
            $startInterval = intval(floor($userIp[0]["created_at"] / 3600) * 3600);
        } else {
            // $startInterval = intval(floor($dataStat["date"] / (3600 * 24)) * 3600 * 24);
            $startInterval = $dataStat["date"] + 3600;
        }

        $endInterval = $startInterval + 3600 - 1;
        $countModel = UserActivity::find();
        $interrupt = false;

        while ($endInterval < intval(date('U')) && !$interrupt) {
            // var_dump(\Yii::$app->formatter->asDate($startInterval, "php:Y-m-d H:i:s"));
            
            $pages = $this->countUsers($startInterval, $endInterval, $countModel);

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
        

        // VIEW
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
        return $this->render('statistics', compact('dayStats', 'dataStats', 'users', 'newUsers', 'pageByDay', 'usersLabels', 'pages', 'pagesLabels'));
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
