<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Region;

/**
 * RegionSearch represents the model behind the search form about `common\models\Region`.
 */
class RegionSearch extends Region
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'create_at', 'update', 'name_ru', 'order_id', 'name_qq', 'xtv_id', 'dtm_id', 'name_uz', 'parent_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Region::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'create_at', $this->create_at])
            ->andFilterWhere(['like', 'update', $this->update])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'order_id', $this->order_id])
            ->andFilterWhere(['like', 'name_qq', $this->name_qq])
            ->andFilterWhere(['like', 'xtv_id', $this->xtv_id])
            ->andFilterWhere(['like', 'dtm_id', $this->dtm_id])
            ->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id]);

        return $dataProvider;
    }
}
