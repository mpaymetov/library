<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Book;

class Genre extends \yii\db\ActiveRecord
{
    public static function tableName() {
        return 'genre';
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['genre_id' => 'id']);
    }
}