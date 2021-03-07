<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PreConstrucciones;
use frontend\models\PropiedadesTipo;
use frontend\models\PropiedadesGaleria;
use frontend\models\Ubicaciones;
use frontend\models\PreConstruccionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PreConstruccionesController implements the CRUD actions for PreConstrucciones model.
 */
class PreConstruccionesController extends Controller
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
     * Lists all PreConstrucciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PreConstruccionesSearch();
        $ubicaciones = Ubicaciones::find()->all();
        $tipos = PropiedadesTipo::find()->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ubicaciones, $tipos);

        return $this->render('index', [
            'tipos' => $tipos,
            'ubicaciones' => $ubicaciones,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionListado()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $searchModel = new PreConstruccionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PreConstrucciones model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionVer($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PreConstrucciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = new PreConstrucciones();
        $galeria = new PropiedadesGaleria();
        $post = Yii::$app->request->post();

        if ($model->load($post)) {

            // print_r($post);
            // exit;
            // $model = $this->get_photo_url($model);
            $galeria->propiedades = 0;
            $model->foto_1 = $this->get_photo_url($model, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 1);
            $model->foto_2 = $this->get_photo_url($model, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 2);
            $model->foto_3 = $this->get_photo_url($model, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 3);
            $model->foto_4 = $this->get_photo_url($model, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 4);
            $galeria->foto_5 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 5);
            $galeria->foto_6 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 6);
            $galeria->foto_7 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 7);
            $galeria->foto_8 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 8);
            $galeria->foto_9 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 9);
            $galeria->foto_10 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 10);
            $galeria->foto_11 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 11);
            $galeria->foto_12 = $this->get_photo_url($galeria, $model->tipoPropiedad->nombre, $model->titulo_publicacion, 12);

            if ($model->impuestos and $model->cargas_gramabes and $model->deslinde and $model->certificado_titulo and $model->certificado_titulo) {
                $model->riezgo_id = 1;
            }else{
                $model->riezgo_id = 0;
            }

            $galeria->save();
            $model->galeria_id = $galeria->id;
            $model->user_id = Yii::$app->user->identity->id;
            $model->fecha_publicacion = date("Y-m-d H:i:s");
            $model->save();

            Yii::$app->session->setFlash('success1','Pre-construcción registrada correctamente');
            return $this->redirect(['ver', 'id' => $model->id]);
        }


        return $this->render('create', [
            'model' => $model,
            'galeria' => $galeria,
        ]);
    }

    function get_photo_url($model, $tipo, $titulo, $i){

        $imagen = null;
        $path = "images/".$tipo."/";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $path = "$path/$titulo/";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $field = "foto_$i";
        if (UploadedFile::getInstance($model, "$field")) {
            $model[$field] = UploadedFile::getInstance($model, "$field");
            $imagen = $path . "foto-$i-" . date('Y-m-d H-i-s') . ".". $model[$field]->extension;
            $model[$field]->saveAs($imagen);
            $model[$field] = $imagen;
        }else{
            $imagen = $model[$field];
        }

        return $imagen;

    }

    /**
     * Updates an existing PreConstrucciones model.
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
     * Deletes an existing PreConstrucciones model.
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
     * Finds the PreConstrucciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PreConstrucciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PreConstrucciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
