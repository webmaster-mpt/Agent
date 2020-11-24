<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\contract;

/**
 * ContractSearch represents the model behind the search form of `frontend\models\contract`.
 */
class ContractSearch extends contract
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_klient', 'id_operations', 'id_property', 'id_sotrudnik'], 'integer'],
            [['date_On', 'date_Off'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = contract::find()->with('klient');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_klient' => $this->id_klient,
            'id_operations' => $this->id_operations,
            'id_property' => $this->id_property,
            'id_sotrudnik' => $this->id_sotrudnik,
            'date_On' => $this->date_On,
            'date_Off' => $this->date_Off,
        ]);

        return $dataProvider;
    }
}
