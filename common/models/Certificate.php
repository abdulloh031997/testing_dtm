<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "certificate".
 *
 * @property int $id
 * @property string|null $lname
 * @property string|null $fname
 * @property string|null $mname
 * @property string|null $bdate
 * @property string|null $psser
 * @property string|null $phone
 * @property string|null $special
 * @property string|null $workplace
 * @property int|null $psnum
 * @property int|null $imie
 * @property string|null $create_at
 * @property string|null $update_at
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['psnum', 'imie'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['lname', 'fname', 'mname', 'bdate', 'psser', 'phone', 'special', 'workplace'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lname' => 'Ismi',
            'fname' => 'Familyasi',
            'mname' => 'Otasining ismi',
            'bdate' => 'Tug\'ulgan sana',
            'psser' => 'Possport Seryasi',
            'phone' => 'Telfon raqami',
            'special' => 'Mutaxasisligi',
            'workplace' => 'Ish joyi',
            'psnum' => 'Possport Seryasi',
            'imie' => 'Imie',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}
