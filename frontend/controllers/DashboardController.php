<?php

namespace frontend\controllers;

use common\models\Edu;
use common\models\EduDirection;
use common\models\Region;

class DashboardController extends \yii\web\Controller
{
    public $layout = '_dash';
    public function actionIndex()
    {
        $edu  = Edu::find()->asArray()->all();
        return $this->render('index', compact('edu'));
    }
    public function actionList($id)
    {
        $edu  = Edu::find()->andWhere(['region_id' =>$id])->asArray()->all();
        return $this->render('list',compact('edu'));
    }
    public function actionRegions()
    {
        $data = Region::find()->where(['parent_id' =>860])->asArray()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('regions', compact('data'));
    }
    
    public function actionEduDirection($id)
    {
        $data = EduDirection::find()->where(['edu_id' =>$id])->all();
        return $this->render('edu-direction', compact('data'));
    }
    public function actionBlock()
    {
        return $this->render('block');
    }

    
  
}
