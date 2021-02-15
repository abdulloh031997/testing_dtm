<?php
namespace frontend\widgets;

use common\models\Logo;
use yii\base\Widget;

class DHeaderWidget extends Widget
{
    public function run()
    {
        return $this->render('d-header');
    }
}
