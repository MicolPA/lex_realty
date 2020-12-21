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
                <div class="col-md-4">
                    <img src="/frontend/web/images/Realty_12LEX_LOGO.png" width="200px">
                </div>
               <!--  <div class="col-md-6">
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    </form>
                </div> -->
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
              <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Propiedades</a>
              <div class="dropdown-menu" aria-labelledby="dropdown07">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item active pl-4 pr-4">
                <a class="nav-link" href="#">Artículos más vistos</a>
            </li>
            <li class="nav-item active pl-4 pr-4">
                <a class="nav-link" href="#">Contactos</a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>
    
    <div class="">
        <?= $content ?>
    </div>
</div>

<div class="bg-blue" style="height: 100px">
    
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?//= Html::encode(Yii::$app->name) ?> <?//= date('Y') ?></p>

        <p class="pull-right"><?//= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
