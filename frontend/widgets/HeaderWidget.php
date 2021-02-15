<?php
namespace frontend\widgets;

use common\models\Logo;
use yii\base\Widget;

class HeaderWidget extends Widget
{
    public function run()
    {
        return $this->render('header');
    }
}
