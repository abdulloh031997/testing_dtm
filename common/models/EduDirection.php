<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_direction".
 *
 * @property string|null $id
 * @property string|null $emode_id
 * @property string|null $edu_id
 * @property string|null $mvdir_id
 * @property string|null $lang_id
 * @property string|null $group_id
 * @property string|null $status
 * @property string|null $region_id
 * @property string|null $create_at
 * @property string|null $update_at
 * @property string|null $name
 * @property string|null $name_ru
 * @property string|null $name_qq
 * @property string|null $flang_id
 * @property string|null $create_edu
 * @property string|null $dir_id
 */
class EduDirection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emode_id', 'edu_id', 'mvdir_id', 'lang_id', 'group_id', 'status', 'region_id', 'create_at', 'update_at', 'name', 'name_ru', 'name_qq', 'flang_id', 'create_edu', 'dir_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emode_id' => 'Emode ID',
            'edu_id' => 'Edu ID',
            'mvdir_id' => 'Mvdir ID',
            'lang_id' => 'Lang ID',
            'group_id' => 'Group ID',
            'status' => 'Status',
            'region_id' => 'Region ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'name' => 'Name',
            'name_ru' => 'Name Ru',
            'name_qq' => 'Name Qq',
            'flang_id' => 'Flang ID',
            'create_edu' => 'Create Edu',
            'dir_id' => 'Dir ID',
        ];
    }
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
