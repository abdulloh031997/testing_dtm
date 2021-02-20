<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu".
 *
 * @property int $id
 * @property int|null $region_id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string $short_name
 * @property int|null $status
 *
 * @property Region $region
 */
class Edu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'status'], 'integer'],
            [['short_name'], 'required'],
            [['name_uz', 'name_ru', 'short_name'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
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
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'short_name' => 'Short Name',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
