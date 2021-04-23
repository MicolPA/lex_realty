<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\web\UploadedFile;
    
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $propiedad_id=null, $propiedad=0)
    {
        if (isset(Yii::$app->user->identity->id)) {
            $this->layout = '@app/views/layouts/main-admin';
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'propiedad' => $propiedad,
            'propiedad_id' => $propiedad_id,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        $this->layout = '@app/views/layouts/main-admin';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();

        $old_url = $model->photo_url;
        if ($model->load($post)) {
            if (UploadedFile::getInstance($model, 'photo_url')) {
                $model->photo_url = UploadedFile::getInstance($model, 'photo_url');
                $path = "images/users/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $imagen = $path . trim($model->first_name). ' ' . trim($model->last_name) . ' ' . date('Y-m-d H-i-s') . ".". $model->photo_url->extension;
                $model->photo_url->saveAs($imagen);
                $model->photo_url = $imagen;
            }else{
                $model->photo_url = $old_url;
            }
            if ($post['password'] != '000000000') {
                $user = \common\models\User::findOne($id);
                $user->setPassword($post['password']);
                $user->generateAuthKey();
                $user->save();
            }
            $model->first_name = $post['User']['first_name'];
            $model->last_name = $post['User']['last_name'];
            $model->email = $post['User']['email'];
            $model->username = $post['User']['username'];
            $model->save();
            Yii::$app->session->setFlash('success1', "Usuario modificado correctamente");
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGenerarReporte(){

        $get = Yii::$app->request->get();
        
        if (isset($get['lideres'])) {
            $model = \frontend\models\User::find()->where(['role_id' => 1])->all();
            
        }else{
            $model = \frontend\models\User::find()->where(['<>', 'id', 6])->all();
        }


        $content = $this->renderPartial('report-template',['model' => $model]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_LEGAL,
            'marginTop' => 6.3,
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
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
