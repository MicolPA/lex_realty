<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Propiedades;
use frontend\models\PropiedadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PropiedadesController implements the CRUD actions for Propiedades model.
 */
class PropiedadesController extends Controller
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
     * Lists all Propiedades models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropiedadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Propiedades model.
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
     * Creates a new Propiedades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Propiedades();

        if ($model->load(Yii::$app->request->post())) {

            $model = $this->get_photos_url($model);
            // $model->foto_1 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_1'), $path, 1);
            // $model->foto_2 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_2'), $path, 2);
            // $model->foto_3 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_3'), $path, 3);
            // $model->foto_4 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_4'), $path, 4);

            
            $model->fecha_publicacion = date("d/m/Y H:i:s");
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    function get_photos_url($model){

        $path = "images/".$model->tipoPropiedad->nombre."/";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $path = "$path/$model->titulo_publicacion/";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $model->foto_1 = UploadedFile::getInstance($model, 'foto_1');
        $imagen = $path . 'foto-1-' . date('Y-m-d H-i-s') . ".". $model->foto_1->extension;
        $model->foto_1->saveAs($imagen);
        $model->foto_1 = $imagen;

        $model->foto_2 = UploadedFile::getInstance($model, 'foto_2');
        $imagen = $path . 'foto-2-' . date('Y-m-d H-i-s') . ".". $model->foto_2->extension;
        $model->foto_2->saveAs($imagen);
        $model->foto_2 = $imagen;

        $model->foto_3 = UploadedFile::getInstance($model, 'foto_3');
        $imagen = $path . 'foto-3-' . date('Y-m-d H-i-s') . ".". $model->foto_3->extension;
        $model->foto_3->saveAs($imagen);
        $model->foto_3 = $imagen;

        $model->foto_4 = UploadedFile::getInstance($model, 'foto_4');
        $imagen = $path . 'foto-4-' . date('Y-m-d H-i-s') . ".". $model->foto_4->extension;
        $model->foto_4->saveAs($imagen);
        $model->foto_4 = $imagen;

        return $model;

    }

    /**
     * Updates an existing Propiedades model.
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
     * Deletes an existing Propiedades model.
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
     * Finds the Propiedades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Propiedades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Propiedades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
