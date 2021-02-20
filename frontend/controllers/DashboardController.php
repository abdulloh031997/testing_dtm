<?php

namespace frontend\controllers;

use common\models\Edu;

class DashboardController extends \yii\web\Controller
{
    public $layout = '_dash';
    public function actionIndex()
    {
        $edu  = Edu::find()->asArray()->where(['status' => 1])->all();
        return $this->render('index', compact('edu'));
    }
    public function actionList()
    {
        return $this->render('list');
    }
    public function actionBookmarks()
    {
        return $this->render('bookmarks');
    }
    
  
}
