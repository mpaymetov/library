<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Genre;
use app\models\Author;

class Book extends \yii\db\ActiveRecord
{
    public static function tableName() {
        return 'book';
    }

    public function attributeLabels(){
        return [
            'id' => 'ID',
            'name' => 'Name',
            'year' => 'Publication year',
            'genre_id' => 'Genre',
            'author_id' => 'Author',
            'page_count' => 'Pages Count',
            'image' => 'Image of book',
            'description' => 'Description',
            'created_at' => 'Created datetime',
        ];
    }

    public function getGenre() {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }

    public function getAuthor() {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }
}