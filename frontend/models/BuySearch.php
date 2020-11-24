<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\buy;

/**
 * BuySearch represents the model behind the search form of `frontend\models\buy`.
 */
class BuySearch extends buy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_klient'], 'integer'],
            [['Fname', 'name', 'Sname', 'telephone'], 'safe'],
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
        $query = buy::find();

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
        ]);

        $query->andFilterWhere(['like', 'Fname', $this->Fname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'Sname', $this->Sname])
            ->andFilterWhere(['like', 'telephone', $this->telephone]);

        return $dataProvider;
    }
}
