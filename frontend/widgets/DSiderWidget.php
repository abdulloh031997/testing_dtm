<?php
namespace frontend\widgets;
use Yii;
use common\models\CompanyPost;
use common\models\Profile;
use common\models\User;
use yii\base\Widget;

class DSiderWidget extends Widget
{
    public function run()
    {
        return $this->render('d-sider');
    }
}
