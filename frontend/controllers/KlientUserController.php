<?php

namespace frontend\controllers;

use Yii;
use frontend\models\klientuser;
use frontend\models\KlientUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\SignupForm;
use yii\web\HttpException;
use yii\web\UploadedFile as WebUploadedFile;
/**
 * KlientUserController implements the CRUD actions for klientuser model.
 */
class KlientUserController extends Controller
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
     * Lists all klientuser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new klientuser();
        $file = WebUploadedFile::getInstance($model, 'photo');
        if(Yii::$app->user->isGuest || !SignupForm::hasRole(1))
        throw new HttpException(500, "Ошибка");
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
     * Displays a single klientuser model.
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
     * Creates a new klientuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new klientuser();
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
     * Updates an existing klientuser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing klientuser model.
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
     * Finds the klientuser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return klientuser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = klientuser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
