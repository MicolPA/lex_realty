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
        $tipos = PropiedadesTipo::find()->where(['<>', 'id', 2])->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ubicaciones, $tipos);
        $countQuery = clone $dataProvider->query;
        $pagination = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $model = $dataProvider->query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index', [
            'tipos' => $tipos,
            'model' => $model,
            'pagination' => $pagination,
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
    public function actionVer($id, $first=null)
    {
        $model = $this->findModel($id);
        Yii::$app->view->params['imagen_url'] = $_SERVER['HTTP_HOST'] . "/frontend/web/".$model['foto_1'];

        return $this->render('view', [
            'first' => $first,
            'model' => $model,
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

            if ($model->certificado_titulo and $model->cargas_gramabes and $model->deslinde and $model->permisos_municipales and $model->permiso_ambiental and $model->objeccion_ministerio_turismo and $model->permiso_obras_publicas and $model->confortur) {
                $model->riezgo_id = 1;
            }else{
                $model->riezgo_id = 0;
            }

            $galeria->save();
            $model->galeria_id = $galeria->id;
            $model->fecha_publicacion = date("Y-m-d H:i:s");

            if ($model->save()) {
                Yii::$app->session->setFlash('success1','Pre-construcción registrada correctamente');
                return $this->redirect(['ver', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('error1','Error al guardar la Pre-construcción');
            }
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
        $this->layout = '@app/views/layouts/main-admin';
        $model = $this->findModel($id);

        $galeria = PropiedadesGaleria::find()->where(['id' => $model->galeria_id, 'propiedades' => 0])->one();
        if (!$galeria) {
            $galeria = new PropiedadesGaleria();
            $galeria->save();
            $model->galeria_id = $galeria->id;
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->certificado_titulo and $model->cargas_gramabes and $model->deslinde and $model->permisos_municipales and $model->permiso_ambiental and $model->objeccion_ministerio_turismo and $model->permiso_obras_publicas and $model->confortur) {
                $model->riezgo_id = 1;
            }else{
                $model->riezgo_id = 0;
            }
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
            $model->save();
            return $this->redirect(['listado']);
        }

        return $this->render('update', [
            'model' => $model,
            'galeria' => $galeria,
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

        return $this->redirect(['listado']);
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
