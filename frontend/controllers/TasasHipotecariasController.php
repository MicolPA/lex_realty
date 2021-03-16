<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TasasHipotecarias;
use frontend\models\TasasHipotecariasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\ContactForm;

/**
 * TasasHipotecariasController implements the CRUD actions for TasasHipotecarias model.
 */
class TasasHipotecariasController extends Controller
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
     * Lists all TasasHipotecarias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TasasHipotecariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionListado()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $searchModel = new TasasHipotecariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TasasHipotecarias model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = '@app/views/layouts/main-admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    function actionContactarOficial($id){

        $oficial = $this->findModel($id);
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {

            $this->render('email', ['model' =>  $model, 'correo' => $oficial->correo, 'banco_nombre' => $oficial->nombre_banco]);

            Yii::$app->session->setFlash('success1', 'Mensaje enviado correctamente');
            return $this->redirect(['index']);
            
        }

        return $this->render('contactar-oficial', [
            'model' => $model,
            'oficial' => $oficial,
        ]);

    }

    /**
     * Creates a new TasasHipotecarias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TasasHipotecarias();

       
        $this->layout = '@app/views/layouts/main-admin';
        if ($model->load(Yii::$app->request->post())) {
            $path = "images/bancos/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $model->photo_url = UploadedFile::getInstance($model, 'photo_url');
            $imagen = $path . trim($model->nombre_banco) . ' ' . date('Y-m-d H-i-s') . ".". $model->photo_url->extension;
            $model->photo_url->saveAs($imagen);
            $model->photo_url = $imagen;
            $model->save();
            Yii::$app->session->setFlash('success1','Registro creado correctamente');
            return $this->redirect(['listado']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TasasHipotecarias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $old_url = $model->photo_url;
        if ($model->load(Yii::$app->request->post())) {
            if (UploadedFile::getInstance($model, 'photo_url')) {
                $path = "images/bancos/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $model->photo_url = UploadedFile::getInstance($model, 'photo_url');
                $imagen = $path . trim($model->nombre_banco) . ' ' . date('Y-m-d H-i-s') . ".". $model->photo_url->extension;
                $model->photo_url->saveAs($imagen);
                $model->photo_url = $imagen;
            }else{
                $model->photo_url = $old_url;
            }
            
            $model->save();
            Yii::$app->session->setFlash('success1','Registro creado correctamente');
            return $this->redirect(['listado']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TasasHipotecarias model.
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
     * Finds the TasasHipotecarias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TasasHipotecarias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TasasHipotecarias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
