<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <?php $form = ActiveForm::begin(['id' => 'form-signup contactForm']); ?>
                    <?= $form->field($model, 'username',['template' =>'{input}<label class="label-control" for="cname">{label}</label><div class="help-block with-errors"></div>'])->textInput(['id'=>'cname','autofocus' => false ,'class' =>'form-control-input']) ?>

                    <?= $form->field($model, 'password',['template' =>'{input}<label class="label-control" for="cname">{label}</label><div class="help-block with-errors"></div>'])->passwordInput(['id'=>'cemail','autofocus' => true ,'class' =>'form-control-input']) ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div style="color:#999;margin-bottom: 10px">
                    Parolni esingizdan chiqardizmi <?= Html::a('Reset it', ['site/request-password-reset']) ?>.
                </div>
                    <div class="form-group">
                        <?= Html::submitButton('Kirish', ['class' => 'form-control-submit-button disabled', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="/images/header-teamwork.svg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->