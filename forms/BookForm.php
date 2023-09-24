<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use app\models\Book;

class BookForm extends Model {
    public $name;
    public $year;
    public $genre_id;
    public $author_id;
    public $page_count;
    public $description;

    public function rules()
    {
        return [
            [['name', 'year', 'genre_id', 'author_id', 'page_count', 'description'], 'required'],
            [['year', 'page_count'], 'integer'],
            [['name', 'author_id', 'description'], 'string'],
        ];
    }

    public function create()
    {
        if (!$this->validate()) {
            return null;
        }

        $book = new Book();
        $book->name = $this->name;
        $book->year = $this->year;
        $book->genre_id = $this->genre_id;
        $book->author_id = $this->author_id;
        $book->page_count = $this->page_count;
        $book->description = $this->description;

        if ($book->save()) {
            return $book;
        } else {
            return null;
        }
    }
}
