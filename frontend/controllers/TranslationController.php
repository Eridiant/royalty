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
use frontend\models\Language;
use frontend\models\Trasnlations;
use frontend\models\TrasnlationsMessage;
use frontend\models\TrasnlationsSearch;
use yii\caching\TagDependency;

/**
 * TranslationController
 */
class TranslationController extends Controller
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
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
    // lg_message -> TrasnlationsMessage 
    // lg_source_message -> Trasnlations
    public function actionTranslationAjax()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->user->isGuest) {
            return ['data' => ['success' => false]];
        }
        $key = Yii::$app->request->post('key');
        $translation = Trasnlations::find()->where('message =:message', [':message' => $key])->exists();
        // $translation = Trasnlations::find()->where(['message' => $key])->one();

        if(!$translation) {
            $translation = new Trasnlations();
            $translation->category = 'frontend';
            $translation->message = $key;
            if(!$translation->save()) {
                return ['data' => ['success' => false]];
            }
            $model = false;
        } else {
            $translation = Trasnlations::find()->where('message =:message', [':message' => $key])->one();
            $model = $translation->translait;
        }

        if(!$model)  {
            $model = new TrasnlationsMessage();
            $model->id = $translation->id;
            $model->language = \Yii::$app->language;
        }

        $model->translation = Yii::$app->request->post('translation');

        if($model->save()) {
            Yii::$app->cache->flush();
            // TagDependency::invalidate(Yii::$app->cache, 'translation');
            return ['data' => ['success' => true]];
        }
        return ['data' => ['success' => false]];

        ///// update
        $translation = Trasnlations::findOne((int)$id);
        $model = $translation->translait;
        if(!$model)  {
            $model = new TrasnlationsMessage();
            $model->id = $translation->id;
            $model->language = \Yii::$app->language;
        }
        if($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                TagDependency::invalidate(Yii::$app->cache, 'translation');
                Yii::$app->session->setFlash('success', 'Translation successfully updated.');
                return $this->redirect(['active']);
            }
        }
        
        return $this->render('update-translation', [
            'model' => $model,
            'translation' => $translation
        ]);
        ///// create
        $translation = new Trasnlations();
        if($translation->load(Yii::$app->request->post())) {
            if($translation->save()) {
                Yii::$app->session->setFlash('success', 'Translation successfully created.');
                return $this->redirect(['active']);
            }
        }
        return $this->render('create-translation', [
            'model' => $translation,
        ]);
    }
}