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
            [['yearFrom', 'yearTo', 'pageFrom', 'pageTo'], 'integer'],
            [['name', 'genre', 'author'], 'safe'],
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

        $genreId = null;
        if ($this->genre) {
            if ($genre = Genre::find()->where(['name' => $this->genre])->one()) {
                $genreId = $genre->id;
            } else {
                $genreId = -1;
            }
        }

        $authorId = null;
        if ($this->author) {
            if ($author = Author::find()->where(['name' => $this->author])->one()) {
                $authorId = $author->id;
            } else {
                $authorId = -1;
            }
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'genre_id', $genreId])
            ->andFilterWhere(['like', 'author_id', $authorId])
            ->andFilterWhere(['>=', 'year', $this->yearFrom])
            ->andFilterWhere(['<=', 'year', $this->yearTo])
            ->andFilterWhere(['>=', 'page_count', $this->pageFrom])
            ->andFilterWhere(['<=', 'page_count', $this->pageTo]);

        return $dataProvider;
    }
}