<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use frontend\models\Propiedades;
use frontend\models\PreConstrucciones;
use frontend\models\Ubicaciones;
use frontend\models\PreConstruccionesSearch;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Anuncios;
use common\components\paypal;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new \frontend\models\Formularios();
        $constante = \frontend\models\Constantes::find()->where(['nombre' => 'precio_debida_diligencia'])->one();
        $titulos = \frontend\models\Titulos::find()->all();
        
        return $this->render('index',[
            'model' => $model,
            'constante' => $constante,
            'titulos' => $titulos,
        ]);
    }

    public function actionIndexOld()
    {

        $entradas = \frontend\models\Entradas::find()->orderBy(['id' => SORT_DESC])->all();
        $anuncios = Anuncios::find()->where(['lugar' => 'inicio'])->all();
        $ubicaciones = Ubicaciones::find()->all();
        $model = new \frontend\models\PropiedadesSearch();
        $model2 = new \frontend\models\PreConstruccionesSearch();
        $propiedades = Propiedades::find()->where(['riezgo_id' => 1])->orderBy([ 'rand()' => SORT_DESC])->limit(4)->all();
        $pre_construcciones = PreConstrucciones::find()->orderBy([ 'rand()' => SORT_DESC])->limit(3)->all();
        return $this->render('index-old',[
            'model' => $model,
            'model2' => $model2,
            'entradas' => $entradas,
            'propiedades' => $propiedades,
            'ubicaciones' => $ubicaciones,
            'anuncios' => $anuncios,
            'pre_construcciones' => $pre_construcciones,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = '@app/views/layouts/main-no-menu';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['propiedades/listado']);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = new SignupForm();
        $post = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $user = \frontend\models\User::find()->where(['email' => $post['SignupForm']['email']])->one();
            if ($user) {
                return $this->redirect(['user/update', 'id' => $user->id]);
            }
            // Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            // return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionTasasHipotecarias(){
        return $this->render('tasas-hipotecarias', [
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }


    public function saveForm($post){

        $post = Yii::$app->request->post();
        $model = new \frontend\models\Formularios();
        
        if ($model->load($post)) {

            $path = $this->getPath();
            $model->identificacion_url = UploadedFile::getInstance($model, 'identificacion_url');
            $imagen = $path . trim($model->identificacion) . "-identificacion.". $model->identificacion_url->extension;
            $model->identificacion_url->saveAs($imagen);
            $model->identificacion_url = $imagen;

            $model->certificado_titulo_url = UploadedFile::getInstance($model, 'certificado_titulo_url');
            $imagen = $path . trim($model->identificacion) . "-certificado.". $model->certificado_titulo_url->extension;
            $model->certificado_titulo_url->saveAs($imagen);
            $model->certificado_titulo_url = $imagen;

            $model->pago_total =  $post['precio'];

            
            $model->date = date("Y-m-d H:i:s");
            // echo $post['precio'];
            $model->save();
            return $model;
            // setcookie("id_form", $model->id, time() + 3600); 
            // $this->redirect(['checkout', 'item_name' => 'Solicitud Debida Diligencia', 'amount' => $post['precio'], 'form_id' => $model->id]);
        }
    }

    function getPath(){

        $path = "images/formularios-info/";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        return $path;
    }

    public function actionCheckout(){

        // if (!$form_id) {$this->redirect(['index']); }

        $post = Yii::$app->request->post();

        if ($model = $this->saveForm($post)) {

            $post = Yii::$app->request->post();
            return $this->render('checkout', [
                'model' => $model,
                'precio' => $post['precio'],
            ]);

        }

        $this->redirect(['index']);
    }

    public function actionCheckoutOld($item_name, $amount){
        // Setup order information array with all items
        $params = [
            'method'=>'paypal',
            'intent'=>'sale',
            'order'=>[
                'description' => 'Pago solicitud ' . $item_name . ' drtitlesearch.com',
                'subtotal'=>$amount,
                'shippingCost'=>0,
                'total'=>$amount,
                'currency'=>'USD',
                'items'=>[
                    [
                        'name'=> $item_name,
                        'price'=> $amount,
                        'quantity'=> 1,
                        'currency'=>'USD'
                    ],
                    

                ]

            ]
        ];
        
        // In this action you will redirect to the PayPpal website to login with you buyer account and complete the payment
        Yii::$app->PayPalRestApi->checkOut($params);
    }

    public function actionMakePayment(){

        $constante = \frontend\models\Constantes::find()->where(['nombre' => 'precio_debida_diligencia'])->one();
         // Setup order information array 
        $params = [
            'order'=>[
                'description'=>'Pago solicitud Solicitud Debida Diligencia drtitlesearch.com',
                'subtotal'=> $constante['contenido'],
                'shippingCost'=> 0,
                'total'=> $constante['contenido'],
                'currency'=>'USD',
            ]
        ];
        // In case of payment success this will return the payment object that contains all information about the order
        // In case of failure it will return Null
        var_dump(Yii::$app->PayPalRestApi->processPayment($params));
        print_r(\yii\helpers\Json::decode(Yii::$app->PayPalRestApi->processPayment($params)));
        exit;
        $result = Yii::$app->PayPalRestApi->processPayment($params);
        return $this->saveTransaction(Yii::$app->request->get(), $result);
    }

    function saveTransaction($data, $result){
        $view = 'payment-fail';

        $record = \frontend\models\Formularios::findOne($_COOKIE['id_form']);
        if ($data) {
            $model = new \frontend\models\TransactionInfo();

            $model->payment_id = $data['paymentId'];
            $model->token = $data['token'];
            $model->payer_id = $data['PayerID'];
            if ($data['success']) {
                $view = 'payment-success';
                $model->state = 1;
            }else{
                $model->state = 0;
            }
            $model->date = date("Y-m-d H:i:s");
            if ($model->save()) {
                $record->transaction_id = $model->id;
                $record->pagado = $model->state;
            }
        }else{
            $record->pagado = 0;
        }
        
        $record->save();
        unset($_COOKIE['id_form']);

        return $this->redirect([$view]);

    }

    function actionPaymentSuccess($id){
        $model = \frontend\models\Formularios::findOne($id);
        $transaccion = \frontend\models\TransactionDetails::findOne($model['transaction_id']);

        if ($model->email_notification == 0) {
            $this->sendEmailNotificacion($model, $transaccion);
        }

        return $this->render('payment-success', [
            'model' => $model,
            'transaccion' => $transaccion,
        ]);
    }


    function sendEmailNotificacion($model, $transaccion){

        $this->render('email-config', ['model' => $model, 'transaccion' => $transaccion]);
    }

    function actionPrueba($id){

        $model = \frontend\models\Formularios::findOne($id);
        $transaccion = \frontend\models\TransactionDetails::findOne($model['transaction_id']);
        
        $this->render('email-config', ['model' => $model, 'transaccion' => $transaccion]);
    }

    function actionPaymentFail(){
        return $this->render('payment-fail', [
        ]);
    }

    function actionSaveTransaction(){

        $get = Yii::$app->request->get();
        $payer = $get['payer'];
        // exit;

        $model = new \frontend\models\TransactionDetails();

        $model->payer_first_name = $payer['name']['given_name'];
        $model->payer_last_name = $payer['name']['surname'];
        $model->payer_id = $payer['payer_id'];
        $model->payer_email = $payer['email_address'];
        $model->country_code = $payer['address']['country_code'];

        //Id de la transaccion
        $model->invoice_number = $get['data']['purchase_units'][0]['payments']['captures'][0]['id'];
        $model->amount = $get['data']['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
        // $model->amount = $data['transactions']['amount']['total'];


        $model->state = $get['data']['status'];
        $model->date = date("Y-m-d H:i:s");

        // $model->pagado = $data['status'] == 'COMPLETED' ? 1 : 0;

        if ($model->save()) {
            $record = \frontend\models\Formularios::findOne($get['form_id']);
            $record->transaction_id = "$model->id";
            if ($model->state == 'COMPLETED') {
                $record->pagado = 1;
            }
            $record->procesado = 1;
            $record->save();
        }

        return \yii\helpers\Json::encode($model);




    }

    function actionVerSolicitud($id){

        $model = \frontend\models\Formularios::findOne($id);
        $transaccion = \frontend\models\TransactionDetails::findOne($model['transaction_id']);

        $post = Yii::$app->request->post();
        if ($post) {
            if ($post['identificacion'] == $model['identificacion'] and $post['no_transaccion'] == $transaccion['invoice_number']) {
               Yii::$app->session->setFlash('success1', 'Correcto');
            } else {
                Yii::$app->session->setFlash('error1', 'Los datos suministrados no coinciden');
            }
        }
        
        return $this->render('ver-solicitud', [
            'model' => $model,
            'transaccion' => $transaccion,
        ]);
    }
}
