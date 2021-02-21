<?php

namespace frontend\controllers;

use common\models\Edu;
use common\models\Region;

class DashboardController extends \yii\web\Controller
{
    public $layout = '_dash';
    public function actionIndex()
    {
        $edu  = Edu::find()->where(['status' => 1])->asArray()->all();
        return $this->render('index', compact('edu'));
    }
    public function actionList($id)
    {
        $edu  = Edu::find()->where(['status' => 1])->andWhere(['region_id' =>$id])->asArray()->all();
        return $this->render('list',compact('edu'));
    }
    public function actionRegions()
    {
        $data = Region::find()->asArray()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('regions', compact('data'));
    }
    
  
}
