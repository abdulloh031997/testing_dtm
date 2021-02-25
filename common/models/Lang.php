<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lang".
 *
 * @property string|null $id
 * @property string|null $name
 * @property string|null $name_ru
 * @property string|null $name_qq
 * @property string|null $create_at
 * @property string|null $update_at
 */
class Lang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'name_ru', 'name_qq', 'create_at', 'update_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_ru' => 'Name Ru',
            'name_qq' => 'Name Qq',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
    public function getDirection()
    {
        return $this->hasMany(EduDirection::className(), ['lang_id' => 'id']);
    }
}
