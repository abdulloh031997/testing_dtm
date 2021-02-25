<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dir".
 *
 * @property string|null $id
 * @property string|null $block1
 * @property string|null $block2
 */
class Dir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'block1', 'block2'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block1' => 'Block1',
            'block2' => 'Block2',
        ];
    }
}
