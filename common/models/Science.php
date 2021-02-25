<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "science".
 *
 * @property string|null $id
 * @property string|null $name
 * @property string|null $create_at
 * @property string|null $update_at
 * @property string|null $name_ru
 * @property string|null $name_qq
 */
class Science extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'science';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'create_at', 'update_at', 'name_ru', 'name_qq'], 'string', 'max' => 255],
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
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'name_ru' => 'Name Ru',
            'name_qq' => 'Name Qq',
        ];
    }
    public function getDir()
    {
        return $this->hasMany(Dir::className(), ['id' => 'tags']);
    }
}
