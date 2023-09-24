<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use app\models\Book;

class BookForm extends Model {
    public $name;
    public $year;
    public $genre;
    public $author;
    public $page_count;
    public $description;

    public function rules()
    {
        return [
            [['name', 'year', 'genre', 'author', 'page_count', 'description'], 'required'],
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
        $book->genre_id = 2;
        $book->author_id = 2;
        $book->page_count = $this->page_count;
        $book->description = $this->description;

        if ($book->save()) {
            return $book;
        } else {
            return null;
        }
    }
}
