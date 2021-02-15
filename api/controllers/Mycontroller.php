<?php

namespace api\controllers;
use yii\web\Response;
use yii\rest\ActiveController;

class MyController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }
}