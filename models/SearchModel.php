<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * SearchModel represents the model behind the search form of `app\models\Users`.
 */
class SearchModel extends Users
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender'], 'integer'],
            [
                ['photo', 'date', 'name', 'last_name', 'patronymic', 'birth_date', 'city', 'email', 'phone', 'about'],
                'safe'
            ],
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
        $query = Users::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(
            [
                //'id' => $this->id,
                'date' => $this->date,
                'birth_date' => $this->birth_date,
                'gender' => $this->gender,
                'city' => $this->city,
            ]
        );

        $query->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'about', $this->about]);

        return $dataProvider;
    }
}
