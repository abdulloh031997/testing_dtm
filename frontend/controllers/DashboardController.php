<?php

namespace frontend\controllers;

class DashboardController extends \yii\web\Controller
{
    public $layout = '_dash';
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionMessages()
    {
        return $this->render('messages');
    }
    public function actionBookmarks()
    {
        return $this->render('bookmarks');
    }
    
  
}
