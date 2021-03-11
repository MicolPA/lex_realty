<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

if (Yii::$app->user->isGuest) {
    return Yii::$app->response->redirect(['/site/login']);
}else{
}


?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="bg-white">
        <div class="container pt-3 pb-3 bg-white">
            <div class="row">
                <div class="col-md-3">
                   <a href="/"><img src="/frontend/web/images/Lex_logo_2.png" width="150px"></a>
                </div>
                <div class="col-md-8 pt-4 text-right">
                    <span class="h4 title-light pl-3 pr-3">PANEL DE ADMINISTRACIÓN</span>
                </div>
            </div>
        </div>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-darkblue">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <?php if (Yii::$app->user->identity->id == 1): ?>
            <li class="nav-item dropdown active pl-3 pr-3">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown">UBICACIONES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdownMenuButton">
                <a class="dropdown-item" href="/frontend/web/ubicaciones/create">CREAR</a>
                <a class="dropdown-item" href="/frontend/web/ubicaciones">LISTADO</a>
              </div>
            </li>
            <?php endif ?>
            
            <li class="nav-item dropdown active pl-3 pr-3">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown">PROPIEDADES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdownMenuButton">
                <a class="dropdown-item" href="/frontend/web/propiedades/create">CREAR</a>
                <a class="dropdown-item" href="/frontend/web/propiedades/listado">LISTADO</a>
              </div>
            </li>
            <li class="nav-item dropdown active pl-3 pr-3">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown">PRE CONSTRUCCIONES</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdownMenuButton">
                <a class="dropdown-item" href="/frontend/web/pre-construcciones/create">CREAR</a>
                <a class="dropdown-item" href="/frontend/web/pre-construcciones/listado">LISTADO</a>
              </div>
            </li>
            <?php if (Yii::$app->user->identity->id == 1): ?>
            <li class="nav-item dropdown active pl-3 pr-3">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown">TIPOS PROYECTOS</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdownMenuButton">
                <a class="dropdown-item" href="/frontend/web/propiedades-tipo/create">CREAR</a>
                <a class="dropdown-item" href="/frontend/web/propiedades-tipo">LISTADO</a>
              </div>
            </li>
                <li class="nav-item dropdown active pl-3 pr-3">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown">USUARIOS</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdownMenuButton">
                    <a class="dropdown-item" href="/frontend/web/site/signup">CREAR</a>
                    <a class="dropdown-item" href="/frontend/web/user">LISTADO</a>
                  </div>
                </li>
            <?php endif ?>
            <li class="nav-item active pr-4">
                <a class="nav-link" href="/frontend/web/site/logout">CERRAR SESIÓN</a>
            </li>
            <!-- <li class="nav-item active pl-4 pr-4">
                <a class="nav-link" href="#">Artículos más vistos</a>
            </li>
            <li class="nav-item active pl-4 pr-4 ">
                <a class="nav-link" href="#">Contactos</a>
            </li> -->
          </ul>
          
        </div>
      </div>
    </nav>
    
    <div class="">
        <?= $content ?>
    </div>
</div>

<?php if(Yii::$app->session->hasFlash('success1')):?>
    <?php
    $msj = Yii::$app->session->getFlash('success1');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Correcto','$msj','success');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>  

<!-- <div class="bg-blue" style="height: 100px">
    
</div> -->

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?//= Html::encode(Yii::$app->name) ?> <?//= date('Y') ?></p>

        <p class="pull-right"><?//= Yii::powered() ?></p>
    </div>
</footer>
-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
