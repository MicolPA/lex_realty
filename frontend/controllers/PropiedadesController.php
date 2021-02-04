<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Propiedades;
use frontend\models\Ubicaciones;
use frontend\models\PropiedadesTipo;
use frontend\models\PropiedadesExtras;
use frontend\models\PropiedadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\ContactForm;

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
                    // 'delete' => ['POST'],
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
        $searchModel = new PropiedadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    function actionAgente($id){
        return $this->render('agente-form', [
            'id' => $id
        ]);
    }

    /**
     * Displays a single Propiedades model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionVer($id)
    {
        $extra = PropiedadesExtras::find()->where(['propiedad_id' => $id])->one();
        return $this->render('view', [
            'extra' => $extra,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Propiedades model.
     * If creation is successful, the browser will be redirected to the 'ver' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = new Propiedades();
        $extras = new PropiedadesExtras();

        if ($model->load(Yii::$app->request->post()) and $extras->load(Yii::$app->request->post())) {

            $model = $this->get_photos_url($model);

            // $model->foto_1 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_1'), $path, 1);
            // $model->foto_2 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_2'), $path, 2);
            // $model->foto_3 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_3'), $path, 3);
            // $model->foto_4 = $this->get_photo_url(UploadedFile::getInstance($model, 'foto_4'), $path, 4);

            $model->fecha_publicacion = date("Y-m-d H:i:s");
            $model->save();

            

            $extras->propiedad_id = $model->id;
            $extras->date = date("Y-m-d H:i:s");
            $extras->save();

            Yii::$app->session->setFlash('success1','Propiedad registrada correctamente');
            return $this->redirect(['ver', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'extras' => $extras,
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

        if (UploadedFile::getInstance($model, 'foto_1')) {
            $model->foto_1 = UploadedFile::getInstance($model, 'foto_1');
            $imagen = $path . 'foto-1-' . date('Y-m-d H-i-s') . ".". $model->foto_1->extension;
            $model->foto_1->saveAs($imagen);
            $model->foto_1 = $imagen;
        }

        if (UploadedFile::getInstance($model, 'foto_2')) {
            $model->foto_2 = UploadedFile::getInstance($model, 'foto_2');
            $imagen = $path . 'foto-2-' . date('Y-m-d H-i-s') . ".". $model->foto_2->extension;
            $model->foto_2->saveAs($imagen);
            $model->foto_2 = $imagen;
        }

        if (UploadedFile::getInstance($model, 'foto_3')) {
            $model->foto_3 = UploadedFile::getInstance($model, 'foto_3');
            $imagen = $path . 'foto-3-' . date('Y-m-d H-i-s') . ".". $model->foto_3->extension;
            $model->foto_3->saveAs($imagen);
            $model->foto_3 = $imagen;
        }

        if (UploadedFile::getInstance($model, 'foto_4')) {
            $model->foto_4 = UploadedFile::getInstance($model, 'foto_4');
            $imagen = $path . 'foto-4-' . date('Y-m-d H-i-s') . ".". $model->foto_4->extension;
            $model->foto_4->saveAs($imagen);
            $model->foto_4 = $imagen;
        }

        

        return $model;

    }

    function actionEnviarPropuesta($id, $type=1){

        $propiedad = $this->findModel($id);
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post())) {

            // return $this->render('email-user', ['nombre' =>  $model->name, 'correo' => $model->email, 'telefono' => $model->subject, 'cantidad' => $model->body, 'propiedad' => $propiedad]);
            // exit;

            //$message = $this->render('email-user', ['nombre' =>  $model->name, 'correo' => $model->email, 'telefono' => $model->subject, 'cantidad' => $model->body, 'propiedad' => $propiedad]);

            // ini_set( 'display_errors', 1 );
            // error_reporting( E_ALL );
            // $from = "administrador@propiedades.lexrealtymagazine.com";
            // $to = "micolpa08@gmail.com";
            // $subject = "Nueva Propuesta 2";
            // $headers  = 'MIME-Version: 1.0' . "\r\n";
            // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // $headers .= 'To: Micol <micolpa08@gmail.com>' . "\r\n";
            // $headers .= 'From: Contacto <administrador@propiedades.lexrealtymagazine.com>' . "\r\n";
            // $headers = "From: " . $from;
            // $headers.= "Content-Type: text/html;";
            // mail($to,$subject,$message, $headers);
            // exit;

            $this->layout = false;
            $this->render('email-user', ['nombre' =>  $model->name, 'correo' => $model->email, 'telefono' => $model->subject, 'cantidad' => $model->body, 'propiedad' => $propiedad, 'type' => $type]);

            // Yii::$app->mailer->compose()
            //     ->setFrom('administrador@propiedades.lexrealtymagazine.com')
            //     ->setTo($model->email)
            //     ->setSubject('Nueva propuesta')
            //     ->setHtmlBody($this->render('email-user', ['nombre' =>  $model->name, 'correo' => $model->email, 'telefono' => $model->subject, 'cantidad' => $model->body, 'propiedad' => $propiedad]))
            //     ->send();

            if ($type == 1) {
                Yii::$app->session->setFlash('success1', 'Propuesta enviada correctamente');
            }else{
                Yii::$app->session->setFlash('success1', 'Mensaje enviado correctamente');
            }
            // exit;
            return $this->redirect(['ver', 'id' => $id]);

        }else{

        }

        return $this->render('propuesta', [
            'type' => $type,
            'model' => $model,
            'propiedad' => $propiedad,
        ]);
    }

    /**
     * Updates an existing Propiedades model.
     * If update is successful, the browser will be redirected to the 'ver' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $extras = PropiedadesExtras::find()->where(['propiedad_id' => $id])->one();

        $old_foto_1 = $model['foto_1'];
        $old_foto_2 = $model['foto_2'];
        $old_foto_3 = $model['foto_3'];
        $old_foto_4 = $model['foto_4'];

        if ($model->load(Yii::$app->request->post()) and $extras->load(Yii::$app->request->post())) {

            $model = $this->get_photos_url($model);

            if (!UploadedFile::getInstance($model, 'foto_1')) {
                $model->foto_1 = $old_foto_1;
            }
            if (!UploadedFile::getInstance($model, 'foto_2')) {
                $model->foto_1 = $old_foto_2;
            }
            if (!UploadedFile::getInstance($model, 'foto_3')) {
                $model->foto_1 = $old_foto_3;
            }
            if (!UploadedFile::getInstance($model, 'foto_4')) {
                $model->foto_1 = $old_foto_4;
            }
            $model->save();
            $extras->save();
            Yii::$app->session->setFlash('success1','Propiedad modificada correctamente');
            return $this->redirect(['listado']);
        }

        return $this->render('update', [
            'model' => $model,
            'extras' => $extras,
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

        return $this->redirect(['listado']);
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
