<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Region */
?>
<div class="region-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'create_at',
            'update',
            'name_ru',
            'order_id',
            'name_qq',
            'xtv_id',
            'dtm_id',
            'name_uz',
            'parent_id',
        ],
    ]) ?>

</div>
