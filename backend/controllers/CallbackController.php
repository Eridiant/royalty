<?php

namespace backend\controllers;

use backend\models\Callback;
use backend\models\CallbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CallbackController implements the CRUD actions for Callback model.
 */
class CallbackController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ],
    
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'update' => ['get', 'POST'],
                        'delete' => ['get', 'POST'],
                    ],

                ],
                // 'access' => [
                //     'class' => AccessControl::class,
                //     'rules' => [
                //         [
                //             'allow' => true,
                //             'roles' => ['canAdmin'],
                //         ],
                //     ],
                // ],
            ]
        );
    }

    /**
     * Lists all Callback models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CallbackSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Callback model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViews($id)
    {
        $model = Callback::find()->where(['id' => $id])->one();
        $model->viewed = 1;
        $model->save();

        return $this->render('view', compact('model'));
    }
    public function actionView($id)
    {
        $msg = Callback::find()->where(['id' => $id])->one();
        // if (true) {

        // }

        $msg->viewed = 1;
        // var_dump('<pre>');
        // var_dump($msg->save());
        // var_dump('</pre>');
        // die;
        
        $msg->save();
        if ($msg->getErrors()) {
            var_dump($msg->getErrors());die;
        }


        $searchModel = new CallbackSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Callback model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
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
     * Deletes an existing Callback model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Callback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Callback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Callback::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
