<?php

namespace common\models;

use yii\data\ActiveDataProvider;

class ListSearch extends Lists
{

    public function rules()
    {
        return [
            [['id', 'category_id', 'order', 'enabled'], 'integer'],
            [['title', 'preview', 'date'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Lists::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) return $dataProvider;

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'order' => $this->order,
            'date' => $this->date,
            'enabled' => $this->enabled
        ]);

        $query
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'preview', $this->preview])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

    public static function searchTo($category_id)
    {
        return new ActiveDataProvider([
            'query' => Lists::find()
                ->where([
                    'enabled' => 1,
                    'category_id' => $category_id
                ]),
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_ASC,
                    'id' => SORT_DESC
                ]
            ]
        ]);

    }
}
