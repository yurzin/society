<?php

namespace app\controllers;

use Yii;
use app\viewModel\ViewModel;
use app\models\Users;
use app\models\SearchModel;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SiteController implements the CRUD actions for Users model.
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new ViewModel($this->findModel($id));

        return $this->render(
            'view',
            compact('model')
        );
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $path = 'images/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
            $model->photo = $path;

            if ($model->save() && $model->upload()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Данные формы записаны в базу'
                );
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash(
                    'error',
                    'Данные формы не прошли ввалидацию'
                );
            }
        }

        return $this->render(
            'create',
            compact('model')
        );
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $path = 'images/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
            $model->photo = $path;

            if ($model->save() && $model->upload()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Данные формы записаны в базу'
                );
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash(
                    'error',
                    'Данные формы не прошли ввалидацию'
                );
            }
        }

        return $this->render(
            'update',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
