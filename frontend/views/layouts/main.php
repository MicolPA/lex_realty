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
$default_imagen = "/frontend/web/images/logo-principal.png";
$imagen_url = isset($this->params['imagen_url'])?$this->params['imagen_url']:$default_imagen;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="<?= $imagen_url ?>">
    <meta name="twitter:image" content="<?= $imagen_url ?>" />

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= mb_strtoupper(Html::encode($this->title)) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<style>
    @media (min-width: 1200px){
        .container, .container-sm, .container-md, .container-lg, .container-xl {
            max-width: 1100px !important;
        }
    }
</style>
<div class="wrap">
    <div class="container-fluid bg-light-blue container-header">
        <div class="p-0">
            <div class="row">
                <div class="col-md-4 lg-text-right pl-5 pt-4 pb-4 container bg-white m-0">
                   <a href="/"><img src="/frontend/web/images/logo-principal-1.png" width="130px" class="mt-1 mb-1"> </a>
                </div>
                <div class="col-md-1 bg-white"></div>
                <div class="col-md-7 container pt-4 bg-light-blue">
                    <!-- <form class="form-inline" action="/frontend/web/propiedades" method="get">
                        <input class="form-control mr-sm-2 bg-light-blue" name="PropiedadesSearch[titulo_publicacion]" type="search" placeholder="Type keyword(s) here..." aria-label="Search" style="min-width: 300px">
                        <button class="btn my-2 my-sm-0" type="submit" style="background: #e9eaec"><i class="fas fa-search"></i></button>
                    </form> -->
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
          <ul class="navbar-nav m-auto">
            <li class="nav-item active">
                <a class="nav-link text-center" href="/">INICIO</a>
            </li>
            <!-- <li class="nav-item dropdown active pl-3 pr-3">
              <a class="nav-link" href="/frontend/web/propiedades">PROPIEDADES</a>
            </li> -->
            <li class="nav-item active pl-3 pr-3">
                <a class="nav-link" href="/frontend/web/pre-construcciones">PRE CONSTRUCCIONES</a>
            </li>
            <li class="nav-item active pl-3 pr-3 ">
                <a class="nav-link" href="/frontend/web/desarrolladores?stars=1">DESARROLLADORES</a>
            </li>
            <li class="nav-item active pl-3 pr-3 ">
                <a class="nav-link" href="/frontend/web/tasas-hipotecarias">TASA HIPOTECARIA</a>
            </li>
            <li class="nav-item active pl-3 pr-3 ">
                <a class="nav-link" href="https://www.publicaciones.drtitlesearch.com">PUBLICACIONES</a>
            </li>
            <?php if (!Yii::$app->user->isGuest): ?>
                <li class="nav-item2 active pl-4 pr-4">
                    <a href="/frontend/web/admin" class="nav-link btn btn-sm" style="background: #f2f2f2;color:#638eb0">ADM</a>
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

<footer class="bg-darkblue pt-5 pb-5" style="min-height: 380px">
    <div class="container mt-5 pt-5 pb-5">
        <div class="row">
            <div class="col-md-4">
                <img class="mt-4 mb-3" src="/frontend/web/images/logo-footer.png" width="200px">
            </div>

            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><a class="text-white" href="/frontend/web/propiedades">Propiedades</a></li>
                    <li><a class="text-white" href="/frontend/web/tasas-hipotecarias">Tasa hipotecaria</a></li>
                    <li><a class="text-white" href="/frontend/web/pre-construcciones">Pre construcciones</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><a class="text-white" href="#">Publicaciones</a></li>
                    <li><a class="text-white" href="#">Agentes inmobiliarios</a></li>
                    <li><a class="text-white" href="#">Desarrolladores</a></li>
                </ul>
            </div>
            <div class="col-md-2 p-md-0">
                <ul class="list-unstyled">
                    <li><a class="text-white" href="#">Terminos y condiciones</a></li>
                    <li><a class="text-white" href="#">Política de privacidad</a></li>
                    <li><a class="text-white" href="#">Contactos</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php if(Yii::$app->session->hasFlash('success1')):?>
    <?php
    $msj = Yii::$app->session->getFlash('success1');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Correcto','$msj','success');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>  

<?php if(Yii::$app->session->hasFlash('error1')):?>
    <?php
    $msj = Yii::$app->session->getFlash('error1');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Error','$msj','error');";
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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60944d18b762073b"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
