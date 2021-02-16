<?php

namespace frontend\controllers;

class TestController extends \yii\web\Controller
{
    public $layout = '_dash';   
    public function actionIndex()
    {
        return $this->render('index');
    }

}
