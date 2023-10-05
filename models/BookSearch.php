<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class BookSearch extends Book
{
    public $yearFrom;
    public $yearTo;
    public $genre;
    public $author;
    public $pageFrom;
    public $pageTo;

    public function rules()
    {
        return [
            [['yearFrom', 'yearTo', 'pageFrom', 'pageTo', 'genre_id', 'author_id'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Book::find();

        $sort = [
            'attributes' => [
                'id',
                'name',
                'year',
                'page_count',
                'created_at',
            ],
        ];

        $pagination = [
            'pageSize' => 4,
        ];

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort,
            'pagination' => $pagination,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'genre_id', $this->genre_id])
            ->andFilterWhere(['like', 'author_id', $this->author_id])
            ->andFilterWhere(['>=', 'year', $this->yearFrom])
            ->andFilterWhere(['<=', 'year', $this->yearTo])
            ->andFilterWhere(['>=', 'page_count', $this->pageFrom])
            ->andFilterWhere(['<=', 'page_count', $this->pageTo]);

        return $dataProvider;
    }
}