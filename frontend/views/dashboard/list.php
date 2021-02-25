<div class="container-fluid">
    <div class="row">
        <?php

use common\models\EduDirection;
use yii\helpers\Url;

foreach ($edu as $key => $one) : ?>
            <div class="col-md-6 col-xl-4">
                <a href="<?=Url::to(['dashboard/edu-direction','id'=>$one['id']])?>">
                    <div class="card widget-statstic-card">
                        <div class="card-header">
                            <div class="card-header-left">
                                <h5><?= $one['name_uz'] ?></h5>
                            </div>
                        </div>
                        <?php
                        $count = EduDirection::find()->select(['name', 'edu_id', 'COUNT(*) as cnt'])->where(['edu_id' => $one['id']])->orderBy('flang_id')->asArray()->count();
                        ?>
                        <div class="card-block">
                            <i class="icofont icofont-mathematical-alt-1 st-icon bg-c-blue"></i>
                            <div class="text-left">
                                <h3 class="d-inline-block"><?= $count ?> </h3>
                                <i class="feather icon-arrow-up text-c-green f-30 "></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>