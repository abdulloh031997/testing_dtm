<?php

use common\models\Edu;
use yii\helpers\Url;
?>
<div class="container-fluid">
    <div class="row">
        <?php foreach ($data as $key => $one) : ?>
            <div class="col-md-2 col-lg-2">
                <a href="<?= Url::to(['dashboard/list', 'id' => $one['id']]) ?>">
                    <div class="card statustic-card shadow border border-primary">
                        <div class="card-header">
                            <h5 class="font-weight-bold bg-success w-100 text-center text-white p-2" style="border-radius: 40px;"><?= $one['name_uz'] ?></h5>
                        </div>
                        <?php
                            $count = Edu::find()->select(['name_uz', 'region_id', 'COUNT(*) as cnt'])->where(['region_id' => $one['id']])->orderBy('region_id')->asArray()->count();
                        ?>
                        <div class="card-block text-center">
                            <span class="d-block text-c-blue bg-dark text-white font-weight-bold feather icon-home bg-simple-c-pink card1-icon" style="width:39px; line-height: 39px;border-radius: 50%; margin:0 auto;font-weight-bold"> <?= $count ?></span>
                            <p class="m-b-0">Instut va Unverstetlar soni</p>

                        </div>

                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>