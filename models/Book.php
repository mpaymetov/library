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

    public function getGenre() {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }

    public function getAuthor() {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }
}