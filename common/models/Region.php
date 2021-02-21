<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string|null $name_uz
 *
 * @property Edu[] $edus
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
        ];
    }

    /**
     * Gets query for [[Edus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEdus()
    {
        return $this->hasMany(Edu::className(), ['region_id' => 'id']);
    }
}
