<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Book;

class Author extends \yii\db\ActiveRecord
{
    public static function tableName() {
        return 'author';
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['author_id' => 'id']);
    }
}