<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use backend\components\QrCode;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CertificateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Certificates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-index card p-3">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'condensed' => true,
        'hover' => true,
//        'pjax'=>true,
        'tableOptions' => ['class' => 'table-sm'],
        'panel' => [
            'type' => GridView::TYPE_ACTIVE,
            'before' => '{summary}',
            'after' => false,
            'summaryOptions' => [
                'class' => 'float-left',
                'style' => 'display: table; height: 38px;'
                ]
        ],
        'toolbar' => [
            '<div style="align-self: center;">&nbsp;' .
            Html::a('<i class="fa fa-lg fa-plus"></i>',['create'], ['class' => 'btn pl-2 pr-2 btn-success create-specials']).
            Html::a('<i class="fa fa-lg fa-print"></i>',['list'], ['class' => 'btn pl-2 pr-2 ml-1 btn btn-primary','target'=>'blank']).
            '&nbsp; &nbsp; {toggleData} &nbsp; {export}</div>'
        ],
        'panelTemplate' => '{panelBefore}{items}{panelAfter}{panelFooter}',
        'exportConfig' => [
            GridView::EXCEL => [
                'label' => '&nbsp;&nbsp;Excel',
            ],
        ],
        'export' => [
            'icon' => 'fas fa-external-link-alt',
            'fontAwesome' => true,
        ],
        'toggleDataOptions' => [
            'all' => ['icon' => 'fa fa-expand'],
            'page' => ['icon' => 'fa fa-compress'],
        ],
        'showPageSummary' => true,
        'summaryOptions' => [
            'class' => 'summary',
            'style' => 'display: table-cell; vertical-align:middle;'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'lname',
            'fname',
            'mname',
            // 'bdate',
            //'psser',
            // 'phone',
            // 'special',
            // 'workplace',
            [
                'attribute' => 'qrcode',
                'mergeHeader' => true,
                'hAlign' => GridView::ALIGN_CENTER,
                'format' => 'raw',
                'value' => function($model){
                    $text = $model->id;
                    return  '<div>'.Html::img(QrCode::getQrCodeImageUrl($text, 'packet_'.$model->id)).'</div>';
                },
            ],
            //'psnum',
            //'imie',
            //'create_at',
            //'update_at',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'noWrap' => true,
                'buttons' => [

                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => 'Кўриш',
                                'aria-label' => 'Кўриш',

                            ]);
                    },

                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $model->id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => 'Таҳрирлаш',
                                'aria-label' => 'Таҳрирлаш',

                            ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id],
                            [
                                'class' => 'label btn-link',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этот элемент ?',
                                    'method' => 'post',
                                ],
                                'title' => 'Ўчириш',
                                'aria-label' => 'Ўчириш',

                            ]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
