<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Propiedades;
use frontend\models\Ubicaciones;
use frontend\models\PropiedadesTipo;
use frontend\models\PropiedadesGaleria;
use frontend\models\PropiedadesExtras;
use frontend\models\PropiedadesSearch;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\Anuncios;
use frontend\models\ContactForm;
use kartik\mpdf\Pdf;

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
        $anuncios = Anuncios::find()->where(['lugar' => 'sidebar'])->all();
        $searchModel = new PropiedadesSearch();
        $ubicaciones = Ubicaciones::find()->all();
        $tipos = PropiedadesTipo::find()->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ubicaciones, $tipos);
        $countQuery = clone $dataProvider->query;
        $pagination = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $model = $dataProvider->query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render($anuncios ? 'index2' : 'index', [
            'tipos' => $tipos,
            'model' => $model,
            'anuncios' => $anuncios,
            'pagination' => $pagination,
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
    public function actionVer($id, $first=null)
    {
        $model = $this->findModel($id);
        Yii::$app->view->params['imagen_url'] = $_SERVER['HTTP_HOST'] . "/frontend/web/".$model['foto_1'];

        $extra = PropiedadesExtras::find()->where(['propiedad_id' => $id])->one();
        return $this->render('view', [
            'extra' => $extra,
            'first' => $first,
            'model' => $model,
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
        $galeria = new PropiedadesGaleria();
        $post = Yii::$app->request->post();

        if ($model->load($post) and $extras->load(Yii::$app->request->post())) {

            // print_r($post);
            // exit;
            // $model = $this->get_photo_url($model);
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

            if ($model->impuestos and $model->cargas_gramabes and $model->deslinde and $model->certificado_titulo) {
                $model->riezgo_id = 1;
            }else{
                $model->riezgo_id = 0;
            }

            $galeria->save();
            $model->galeria_id = $galeria->id;
            // $model->user_id = Yii::$app->user->identity->id;
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

    function actionContactarAgente($id, $type=1, $user_id, $propiedad=1){

        if ($propiedad == 1) {
            $propiedad_m = $this->findModel($id);
            $listado_propiedades = Propiedades::find()->where(['<=', 'precio', $propiedad_m['precio'] + 50000])->andWhere(['>=', 'precio', $propiedad_m['precio'] - 50000])->andWhere(['user_id' => $propiedad_m['user_id']])->andWhere(['<>', 'id', $propiedad_m['id']])->orderBy(['rand()' => SORT_DESC])->limit(4)->all();
        }else{
            $propiedad_m = \frontend\models\PreConstrucciones::findOne($id);
        }
        $model = new ContactForm();
        $agente = User::findOne($user_id);
        if ($model->load(Yii::$app->request->post())) {

            $this->layout = false;
            $this->render('email-user', ['nombre' =>  $model->name, 'correo' => $model->email, 'telefono' => $model->subject, 'cantidad' => $model->body, 'propiedad' => $propiedad_m, 'type' => $type, 'forma_pago' => $model->forma_pago, 'monto_reserva' => $model->monto_reserva, 'fecha_cierre' => $model->fecha_cierre, 'correo_agente' => $agente['email'], 'propiedad_check' => $propiedad]);

            if ($type == 1) {
                Yii::$app->session->setFlash('success1', 'Propuesta enviada correctamente');
            }else{
                Yii::$app->session->setFlash('success1', 'Mensaje enviado correctamente');
            }

            if ($propiedad) {
                return $this->redirect(['index']);
            }else{
                return $this->redirect(['/pre-construcciones/index']);
            }

        }

        return $this->render('contactar-agente', [
            'type' => $type,
            'agente' => $agente,
            'model' => $model,
            'propiedad' => $propiedad_m,
            'listado_propiedades' => isset($listado_propiedades) ? $listado_propiedades : array(),
        ]);
    }

    function actionEnviarPropuesta($id, $type=1, $user_id, $propiedad=1){

        if ($propiedad == 1) {
            $propiedad_m = $this->findModel($id);
        }else{
            $propiedad_m = \frontend\models\PreConstrucciones::findOne($id);
        }
        $model = new ContactForm();
        $agente = User::findOne($user_id);
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
            $this->render('email-user', ['nombre' =>  $model->name, 'correo' => $model->email, 'telefono' => $model->subject, 'cantidad' => $model->body, 'propiedad' => $propiedad_m, 'type' => $type, 'forma_pago' => $model->forma_pago, 'monto_reserva' => $model->monto_reserva, 'fecha_cierre' => $model->fecha_cierre, 'correo_agente' => $agente['email'], 'propiedad_check' => $propiedad]);

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
            if ($propiedad) {
                return $this->redirect(['index']);
            }else{
                return $this->redirect(['/pre-construcciones/index']);
            }

        }else{

        }

        return $this->render('propuesta', [
            'type' => $type,
            'model' => $model,
            'propiedad' => $propiedad_m,
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
        $galeria = PropiedadesGaleria::find()->where(['id' => $model->galeria_id, 'propiedades' => 1])->one();
        if (!$galeria) {
            $galeria = new PropiedadesGaleria();
            $galeria->save();
            $model->galeria_id = $galeria->id;
        }
        $extras = PropiedadesExtras::find()->where(['propiedad_id' => $id, 'propiedad' => 1])->one();
        if (!$extras) {
            $extras = new PropiedadesExtras();
        }



        if ($model->load(Yii::$app->request->post()) and $extras->load(Yii::$app->request->post())) {

            if ($model->impuestos and $model->cargas_gramabes and $model->deslinde and $model->certificado_titulo) {
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

            if ($model->impuestos and $model->cargas_gramabes and $model->deslinde and $model->certificado_titulo) {
                $model->riezgo_id = 1;
            }else{
                $model->riezgo_id = 0;
            }
            
            $galeria->save();
            $model->save();
            $extras->save();
            Yii::$app->session->setFlash('success1','Propiedad modificada correctamente');
            return $this->redirect(['listado']);
        }

        return $this->render('update', [
            'galeria' => $galeria,
            'model' => $model,
            'extras' => $extras,
        ]);
    }

    public function actionDictamen(){

        $this->layout = '@app/views/layouts/main-admin';
        
        $model = \frontend\models\Constantes::find()->where(['nombre' => 'dictamen'])->one();
        if (!$model) {
            $model = new \frontend\models\Constantes();
            $model->nombre = 'dictamen';
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->session->setFlash('success1','Dictamen modificado correctamente');
        }

        return $this->render('dictamen', [
            'model' => $model,
        ]);
    }

    public function actionVerDictamen($id, $propiedad_check=1){

        $this->layout = '@app/views/layouts/main-admin';
        if ($propiedad_check) {
            $propiedad = $this->findModel($id);
        }else{
            $propiedad = \frontend\models\PreConstrucciones::findOne($id);
        }
        $dictamen = \frontend\models\Constantes::find()->where(['nombre' => 'dictamen'])->one();

        $content = $this->renderPartial('dictamen-pdf',['dictamen' => $dictamen,'propiedad' => $propiedad, 'propiedad_check' => $propiedad_check]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => [200.8, 220.8],
            'marginTop' => 0,
            'marginBottom' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            // 'BackgroundColor' => 'red',
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => ''],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>false,
                'SetFooter'=>false,
                // 'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
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
