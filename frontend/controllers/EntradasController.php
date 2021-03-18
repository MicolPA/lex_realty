<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Entradas;
use frontend\models\EntradasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EntradasController implements the CRUD actions for Entradas model.
 */
class EntradasController extends Controller
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
     * Lists all Entradas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $searchModel = new EntradasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entradas model.
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

    /**
     * Creates a new Entradas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = new Entradas();

        if ($model->load(Yii::$app->request->post())) {
            $path = "images/entradas/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $model->photo_url = UploadedFile::getInstance($model, 'photo_url');
            $imagen = $path . trim($model->titulo) . ' ' . date('Y-m-d H-i-s') . ".". $model->photo_url->extension;
            $model->photo_url->saveAs($imagen);
            $model->photo_url = $imagen;
            $model->date = date("Y-m-d H:i:s");
            $model->save();
            Yii::$app->session->setFlash('success1','Anuncio creado correctamente');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Entradas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = $this->findModel($id);

        $old_url = $model->photo_url;
        if ($model->load(Yii::$app->request->post())) {
            if (UploadedFile::getInstance($model, 'photo_url')) {
                $model->photo_url = UploadedFile::getInstance($model, 'photo_url');
                $path = "images/entradas/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $imagen = $path . trim($model->titulo) .'-'. date('Y-m-d H-i-s') . ".". $model->photo_url->extension;
                $model->photo_url->saveAs($imagen);
                $model->photo_url = $imagen;
            }else{
                $model->photo_url = $old_url;
            }
            $model->save();
            Yii::$app->session->setFlash('success1','Registro actualizado correctamente');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Entradas model.
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
     * Finds the Entradas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entradas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entradas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
