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
                   <a href="/"><img src="/frontend/web/images/Lex_logo.png" width="180px"></a>
                </div>
                <div class="col-md-8 pt-4">
                    <form class="form-inline" action="/frontend/web/propiedades" method="get">
                        <input class="form-control mr-sm-2" name="PropiedadesSearch[titulo_publicacion]" type="search" placeholder="Type keyword(s) here..." aria-label="Search" style="min-width: 300px">
                        <button class="btn bg-gray my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
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
            <li class="nav-item active pr-4">
                <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item active pl-4 pr-4">
                <a class="nav-link" href="#">Categorias</a>
            </li>
            <li class="nav-item dropdown active pl-4 pr-4">
              <!-- <a class="nav-link dropdown-toggle" href="/frontend/web/propiedades">Propiedades</a> -->
              <a class="nav-link" href="/frontend/web/propiedades">Propiedades</a>
             <!--  <div class="dropdown-menu" aria-labelledby="dropdown07">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div> -->
            </li>
            <li class="nav-item active pl-4 pr-4">
                <a class="nav-link" href="#">Artículos más vistos</a>
            </li>
            <li class="nav-item active pl-4 pr-4 ">
                <a class="nav-link" href="#">Contactos</a>
            </li>
            <?php if (!Yii::$app->user->isGuest): ?>
                <li class="nav-item active pl-4 pr-4">
                    <a href="/frontend/web/admin" class="nav-link btn btn-warning">Panel de administración</a>
                </li>
            <?php endif ?>
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
