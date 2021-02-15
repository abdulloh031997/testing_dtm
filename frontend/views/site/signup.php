<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup contactForm']); ?>
                        <?= $form->field($model, 'username',['template' =>'{input}<label class="label-control" for="cname">{label}</label><div class="help-block with-errors"></div>'])->textInput(['id'=>'cname','autofocus' => true ,'class' =>'form-control-input']) ?>

                        <?= $form->field($model, 'email',['template' =>'{input}<label class="label-control" for="cname">{label}</label><div class="help-block with-errors"></div>'])->textInput(['id'=>'cemail','autofocus' => true ,'class' =>'form-control-input']) ?>

                        <?= $form->field($model, 'password',['template' =>'{input}<label class="label-control" for="cname">{label}</label><div class="help-block with-errors"></div>'])->passwordInput(['id'=>'cemail','autofocus' => true ,'class' =>'form-control-input']) ?>

                        <div class="form-group d-flex" style="justify-content: space-between;">
                            <?= Html::submitButton('Ro\'yxatdan o\'tish', ['class' => 'w-75 form-control-submit-button disabled', 'name' => 'signup-button']) ?> <a href="<?=Url::to(['/site/login'])?>" class="text-center pt-3 w-25" style="font-weight: bold;">Kirish</a>
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
