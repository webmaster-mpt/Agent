<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\klient;

/**
 * KlientSearch represents the model behind the search form of `frontend\models\klient`.
 */
class KlientSearch extends klient
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_operations', 'cost', 'id_property'], 'integer'],
            [['Fname', 'name', 'Sname', 'address', 'photo', 'telephone', 'rooms', 'udobstva','activeContract'], 'safe'],
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
        $query = klient::find();

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
            'id_operations' => $this->id_operations,
            'cost' => $this->cost,
            'id_property' => $this->id_property,
        ]);

        $query->andFilterWhere(['like', 'Fname', $this->Fname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'Sname', $this->Sname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'rooms', $this->rooms])
            ->andFilterWhere(['like', 'udobstva', $this->udobstva])
            ->andFilterWhere(['like', 'activeContract', $this->activeContract]);

        return $dataProvider;
    }
}
