<?php

namespace frontend\controllers;

use Yii;
use frontend\models\klient;
use frontend\models\KlientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\SignupForm;
use yii\web\HttpException;
use yii\web\UploadedFile as WebUploadedFile;

/**
 * KlientController implements the CRUD actions for klient model.
 */
class KlientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all klient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KlientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->user->isGuest || !SignupForm::hasRole(2))
        throw new HttpException(500, "Ошибка");
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single klient model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new klient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Klient();
        $file = WebUploadedFile::getInstance($model, 'photo');
        if ($model->load(Yii::$app->request->post())) {
            if ($file) {
                $photoname= uniqid($model->name) . $file->baseName . '.' . $file->extension;
                $file->saveAs(Yii::getAlias('@frontend/web') . '/uploads/' . $photoname);
                $model->photo = $photoname;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing klient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $file = WebUploadedFile::getInstance($model, 'photo');
        if ($model->load(Yii::$app->request->post())) {
            if ($file) {
                $photoname= uniqid($model->name) . $file->baseName . '.' . $file->extension;
                $file->saveAs(Yii::getAlias('@frontend/web') . '/uploads/' . $photoname);
                $model->photo = $photoname;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing klient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the klient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return klient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = klient::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
