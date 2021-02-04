<?php

namespace frontend\controllers;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = '@app/views/layouts/main-admin';
        return $this->render('index');
    }

}
