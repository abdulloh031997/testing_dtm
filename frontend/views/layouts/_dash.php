<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\DashAsset;
use yii\widgets\Breadcrumbs;

DashAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="icon" href="/images/t.png">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Ilmiy markaz</title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="pcoded" class="pcoded iscollapsed" nav-type="st6" theme-layout="vertical" vertical-placement="left" vertical-layout="wide" pcoded-device-type="desktop" vertical-nav-type="expanded" vertical-effect="shrink" vnavigation-view="view1" fream-type="theme1" sidebar-img="false" sidebar-img-type="img1" layout-type="light">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?= \frontend\widgets\DHeaderWidget::widget(); ?>
            <?= \frontend\widgets\DSiderWidget::widget(); ?>
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- Main-body start -->
                    <div class="main-body">
                    
                        <div class="row page-body breadcrumb-page">
                            <div class="col-12">
                                <nav class="page-body breadcrumb-page">
                                    <?php
                                    echo Breadcrumbs::widget([
                                        'options' => ['class' => 'breadcrumb rounded-pill '],
                                        'homeLink' => [
                                            'label' => '<i class="feather icon-home"></i></a></li>',
                                            'url' => Yii::$app->homeUrl.'dashboard/index    ',
                                            'encode' => false,
                                        ],
                                        'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                                        'activeItemTemplate'=>"<li class='breadcrumb-item active' aria-current='page'>{link}</li>\n",
                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    ]);
                                    ?>
                                </nav>
                            </div>
                        </div>
                                        
                        <div class="page-wrapper card">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>