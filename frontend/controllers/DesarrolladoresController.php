<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Desarrolladores;
use frontend\models\DesarrolladoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DesarrolladoresController implements the CRUD actions for Desarrolladores model.
 */
class DesarrolladoresController extends Controller
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
     * Lists all Desarrolladores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DesarrolladoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $countQuery = clone $dataProvider->query;
        $pagination = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $model = $dataProvider->query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index', [
            'model' => $model,
            'pagination' => $pagination,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionListado()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $searchModel = new DesarrolladoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Desarrolladores model.
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
     * Creates a new Desarrolladores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = new Desarrolladores();

        if ($model->load(Yii::$app->request->post())) {

            $path = "images/desarrolladores/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $model->portada = UploadedFile::getInstance($model, 'portada');
            $imagen = $path . trim(str_replace(' ', '-', $model->nombre)) . ' ' . date('Y-m-d H-i-s') . ".". $model->portada->extension;
            $model->portada->saveAs($imagen);
            $model->portada = $imagen;

            $model->logo = UploadedFile::getInstance($model, 'logo');
            $imagen = $path . trim(str_replace(' ', '-', $model->nombre)) . ' ' . date('Y-m-d H-i-s') . ".". $model->logo->extension;
            $model->logo->saveAs($imagen);
            $model->logo = $imagen;

            $model->date = date("Y-m-d H:i:s");
            $model->save();

            Yii::$app->session->setFlash('success1','Desarrolladora creado correctamente');
            return $this->redirect(['create']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Desarrolladores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = $this->findModel($id);

        $old_logo = $model->logo;
        $old_portada = $model->portada;
        if ($model->load(Yii::$app->request->post())) {

            $path = "images/desarrolladores/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            if (UploadedFile::getInstance($model, 'portada')) {
                $model->portada = UploadedFile::getInstance($model, 'portada');
                $imagen = $path . trim(str_replace(' ', '-', $model->nombre)) . ' ' . date('Y-m-d H-i-s') . ".". $model->portada->extension;
                $model->portada->saveAs($imagen);
                $model->portada = $imagen;
            }else{
                $model->portada = $old_portada;
            }

            if (UploadedFile::getInstance($model, 'logo')) {
                $model->logo = UploadedFile::getInstance($model, 'logo');
                $imagen = $path . trim(str_replace(' ', '-', $model->nombre)) . ' ' . date('Y-m-d H-i-s') . ".". $model->logo->extension;
                $model->logo->saveAs($imagen);
                $model->logo = $imagen;
            }else{
                $model->logo = $old_logo;

            }

            $model->save();
            Yii::$app->session->setFlash('success1','Desarrolladora modificada correctamente');
            return $this->redirect(['listado']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Desarrolladores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success1','Desarrolladora eliminada correctamente');
        return $this->redirect(['listado']);
    }

    /**
     * Finds the Desarrolladores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Desarrolladores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Desarrolladores::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
