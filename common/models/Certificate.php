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
            [['psnum', 'imie','ser'], 'integer'],
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
            'lname' => 'Familyasi',
            'fname' => 'Ismi',
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
    public static function getData($psser, $psnum, $imie, $nation_id=1) {
        $person = Person::findOne(['psser' => $psser, 'psnum' => intval($psnum), 'imie' => $imie]);
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        if (!empty($person)) {
            return $person;
        }

        try{
            $data = json_decode(file_get_contents("https://billing.dtm.uz/data-over/data?ps_ser=$psser&ps_num=$psnum&pnfl=$imie", false, stream_context_create($arrContextOptions)));
        } catch (\Exception $e){

        }
        debug($data);
        if (empty($data->status)){
            return null;
        }

        $data = $data->data;
        $person = Person::findOne(['imie' => $imie]);
//        prd($person);
        if (empty($person)) {
            $person = new Person();
            $person->imie = $data->pnfl;
            $person->psser = $data->ps_ser;
            $person->psnum = $data->ps_num;
            $person->lname = $data->sname;
            $person->fname = $data->fname;
            $person->mname = $data->mname;
            $person->sex = $data->sex == 1 ? 1 : 0;
            $person->bdate = $data->birth_date;
            $person->save();
        }
        return $person;
    }
}
