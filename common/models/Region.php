<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property string|null $id
 * @property string|null $name
 * @property string|null $create_at
 * @property string|null $update
 * @property string|null $name_ru
 * @property string|null $order_id
 * @property string|null $name_qq
 * @property string|null $xtv_id
 * @property string|null $dtm_id
 * @property string|null $name_uz
 * @property string|null $parent_id
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }
    public static function primaryKey()
    {
        return ['id'];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'create_at', 'update', 'name_ru', 'order_id', 'name_qq', 'xtv_id', 'dtm_id', 'name_uz', 'parent_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'create_at' => 'Create At',
            'update' => 'Update',
            'name_ru' => 'Name Ru',
            'order_id' => 'Order ID',
            'name_qq' => 'Name Qq',
            'xtv_id' => 'Xtv ID',
            'dtm_id' => 'Dtm ID',
            'name_uz' => 'Name Uz',
            'parent_id' => 'Parent ID',
        ];
    }
}
