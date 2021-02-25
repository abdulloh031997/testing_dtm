<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complex".
 *
 * @property int $id
 * @property string|null $region_id
 * @property int|null $edu_id
 * @property int|null $education_id
 *
 * @property ComplexFans[] $complexFans
 */
class Complex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id'], 'string'],
            [['edu_id', 'education_id'], 'default', 'value' => null],
            [['edu_id', 'education_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'edu_id' => 'Edu ID',
            'education_id' => 'Education ID',
        ];
    }

    /**
     * Gets query for [[ComplexFans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplexFans()
    {
        return $this->hasMany(ComplexFans::className(), ['complex_id' => 'id']);
    }
}
