<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Proyectos;
use frontend\models\ProyectosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\StarsRatingCount;

/**
 * ProyectosController implements the CRUD actions for Proyectos model.
 */
class ProyectosController extends Controller
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
     * Lists all Proyectos models.
     * @return mixed
     */
    public function actionIndex($desarrolladoras_id)
    {
        $desarrolladora = \frontend\models\Desarrolladores::findOne($desarrolladoras_id); 

        Yii::$app->view->params['imagen_url'] = $_SERVER['HTTP_HOST'] . "/frontend/web/".$desarrolladora['portada'];
        $searchModel = new ProyectosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $desarrolladoras_id);

        $countQuery = clone $dataProvider->query;
        $pagination = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $model = $dataProvider->query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();


        $rating = new StarsRatingCount();
        $rating_model = new \frontend\models\Desarrolladores();
        $rating->desarrollador_id = $desarrolladoras_id;

        $post = Yii::$app->request->post();
        if ($rating->load($post)) {
            $this->saveRating($rating, $desarrolladoras_id);
            return $this->redirect(['index', 'desarrolladoras_id' => $desarrolladoras_id, 'stars' => 1]);
        }

        return $this->render('index', [
            'model' => $model,
            'desarrolladora' => $desarrolladora,
            'rating' => $rating,
            'pagination' => $pagination,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'rating_model' => $rating_model,
            'ratings_total' => $this->getRatingTotal($desarrolladoras_id),
        ]);
    }

    function getRatingTotal($desarrolladoras_id){

        $data['fecha_entrega'] = 0;
        $data['calidad_materiales'] = 0;
        $data['entrega_areas_sociales'] = 0;
        $data['entrega_design'] = 0;
        $data['seguimiento_construccion'] = 0;

        $model = StarsRatingCount::find()->where(['desarrollador_id' => $desarrolladoras_id])->all();
        
        if (count($model) > 0) {
            $count = count($model);
            foreach ($model as $m) {
                $data['fecha_entrega'] += $m->fecha_entrega;
                $data['calidad_materiales'] += $m->calidad_materiales;
                $data['entrega_areas_sociales'] += $m->entrega_areas_sociales;
                $data['entrega_design'] += $m->entrega_design;
                $data['seguimiento_construccion'] += $m->seguimiento_construccion;
            }

            $data['fecha_entrega'] = $data['fecha_entrega'] / $count;
            $data['calidad_materiales'] = $data['calidad_materiales'] / $count;
            $data['entrega_areas_sociales'] = $data['entrega_areas_sociales'] / $count;
            $data['entrega_design'] = $data['entrega_design'] / $count;
            $data['seguimiento_construccion'] = $data['seguimiento_construccion'] / $count;
        }
        return $data;

    }

    function saveRating($rating, $desarrolladoras_id){

        $verify = StarsRatingCount::find()->where(['desarrollador_id' => $desarrolladoras_id, 'email' => $rating->email])->one();
        if (!$verify) {
            $rating->date = date("Y-m-d H:i:s");
            $rating->save();
            Yii::$app->session->setFlash('success1','Valoración enviada correctamente');
        }else{
            Yii::$app->session->setFlash('error1', 'Usted ya ha enviado una valoración anteriormente');
        }


    }

    public function actionListado()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $searchModel = new ProyectosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proyectos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionVer($id)
    {
        $model = $this->findModel($id);
        Yii::$app->view->params['imagen_url'] = $_SERVER['HTTP_HOST'] . "/frontend/web/".$model['foto_1'];
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    function get_photo_url($model, $titulo, $i){

        $titulo = str_replace(' ', '-', $titulo);
        $imagen = null;
        $path = "images/proyectos/";

        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }

        $path = "$path/$titulo/";

        if (!file_exists($path)) {
            mkdir($path, 0775, true);
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
     * Creates a new Proyectos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = new Proyectos();

        if ($model->load(Yii::$app->request->post())) {

            $model->foto_1 = $this->get_photo_url($model, $model->nombre, 1);
            $model->foto_2 = $this->get_photo_url($model, $model->nombre, 2);
            $model->foto_3 = $this->get_photo_url($model, $model->nombre, 3);
            $model->foto_4 = $this->get_photo_url($model, $model->nombre, 4);
            $model->foto_5 = $this->get_photo_url($model, $model->nombre, 5);
            $model->foto_6 = $this->get_photo_url($model, $model->nombre, 6);
            $model->foto_7 = $this->get_photo_url($model, $model->nombre, 7);
            $model->foto_8 = $this->get_photo_url($model, $model->nombre, 8);
            $model->date = date("Y-m-d H:i:s");
            $model->save();
            Yii::$app->session->setFlash('success1','Proyecto registrado correctamente');
            return $this->redirect(['listado']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proyectos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->foto_1 = $this->get_photo_url($model, $model->nombre, 1);
            $model->foto_2 = $this->get_photo_url($model, $model->nombre, 2);
            $model->foto_3 = $this->get_photo_url($model, $model->nombre, 3);
            $model->foto_4 = $this->get_photo_url($model, $model->nombre, 4);
            $model->foto_5 = $this->get_photo_url($model, $model->nombre, 5);
            $model->foto_6 = $this->get_photo_url($model, $model->nombre, 6);
            $model->foto_7 = $this->get_photo_url($model, $model->nombre, 7);
            $model->foto_8 = $this->get_photo_url($model, $model->nombre, 8);
            $model->save();

            Yii::$app->session->setFlash('success1','Proyecto editado correctamente');
            return $this->redirect(['listado']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Proyectos model.
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
     * Finds the Proyectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proyectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proyectos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
