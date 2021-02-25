<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complex_fans".
 *
 * @property int $id
 * @property string|null $fan_id
 * @property int|null $ball
 * @property int|null $block_order
 * @property int|null $complex_id
 *
 * @property Complex $complex
 */
class ComplexFans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex_fans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fan_id'], 'string'],
            [['ball', 'block_order', 'complex_id'], 'default', 'value' => null],
            [['ball', 'block_order', 'complex_id'], 'integer'],
            [['complex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complex::className(), 'targetAttribute' => ['complex_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fan_id' => 'Fan ID',
            'ball' => 'Ball',
            'block_order' => 'Block Order',
            'complex_id' => 'Complex ID',
        ];
    }

    /**
     * Gets query for [[Complex]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplex()
    {
        return $this->hasOne(Complex::className(), ['id' => 'complex_id']);
    }
}
