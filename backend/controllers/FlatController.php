<?php

namespace backend\controllers;

use Yii;
use backend\models\Flat;
use backend\models\Floor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * FlatController implements the CRUD actions for Flat model.
 */
class FlatController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['logout', 'index', 'update', 'view', 'create', 'status', 'stat'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Flat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Flat::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flat model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionStatus()
    {

        $request = Yii::$app->request;

        if ($request->isAjax) {
            if ($request->post('floor') !== null) {
                $models = Flat::find()
                ->where(['floor_id' => $request->post('floor')])
                ->all();

                return $this->renderAjax('_status', compact('models'));
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model = Flat::find()
                    ->where('id=:id')
                    ->addParams([':id' => $request->post('id')])
                    ->one();

            $model->status = $request->post('status');

            if($model->save()){
                return ['data' => ['success' => true]];
            }
            return ['data' => ['success' => false]];
        }

        $models = Flat::find()
        ->where(['floor_id' => 1])
        ->all();
        $floors = Floor::find()->all();
        return $this->render('status', compact('models', 'floors'));
    }

    // public function actionStat()
    // {
    //     $fl = 1;
    //     for ($i=2; $i < 19; $i++) {
    //         // $model = new Floor();
    //         // $model->floor = $i;
    //         // $model->save();
    //         // if ($model->save()) {
    //         if (true) {
    //             for ($j=1; $j < 24; $j++) {
    //                 // $floor = new Flat();

    //                 $floor = Flat::find()
    //                     ->where(['id' => $fl])
    //                     ->one();

    //                 $floor->floor_id = $i - 1;
    //                 // $floor->num = $fl;

    //                 $floor->save();
    //                 $fl++;
    //                 if ($floor->getErrors()) {
    //                     var_dump($floor->getErrors());
    //                 }
    //             }
    //         }
            
    //     }
    // }

    // public function actionStat()
    // {
    //     $fl = 392;
    //     $area = [34.95,35.35,35.35,35.35,35.25,33.90,69.70,48.05,69.85,35.15,35.35,35.35,35.35,35.35,35.35,35.35,35.35,35.35,35.15,69.85,48.05,69.60,42.45];
    //     $live = [29.40,29.90,29.90,29.90,29.80,28.35,51.85,38.55,52,29.65,29.90,29.90,29.90,29.90,29.90,29.90,29.90,29.90,29.65,52,38.55,51.75,35.80];
    //     $balcone = [5.55,5.45,5.45,5.45,5.45,5.55,17.85,9.50,17.85,5.50,5.45,5.45,5.45,5.45,5.45,5.45,5.45,5.45,5.50,17.85,9.50,17.85,6.65];
    //     // for ($i=2; $i < 19; $i++) {
    //         // $model = new Floor();
    //         // $model->floor = $i;
    //         // $model->save();
    //         $i = 18;
    //         // if ($model->save()) {
    //         if (true) {
    //             for ($j=1; $j < 24; $j++) {
    //                 $floor = new Flat();
    //                 // $floor = Flat::find()
    //                 //     ->where(['id' => $fl])
    //                 //     ->one();

    //                 $floor->floor_id = $i;
    //                 $floor->num = $fl;
    //                 $floor->total_area = $area[$j-1];
    //                 $floor->living_space = $live[$j-1];
    //                 $floor->balcony_area = $balcone[$j-1];

    //                 $floor->save();
                    
    //                 $fl++;
    //                 if ($floor->getErrors()) {
    //                     var_dump($floor->getErrors());
    //                 }
    //             }
    //         }
            
    //     // }
    // }

    /**
     * Creates a new Flat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Flat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Flat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Flat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Flat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Flat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
