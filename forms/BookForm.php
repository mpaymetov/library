<?php

namespace app\forms;

use yii\base\Model;
use app\models\Book;
use yii\web\UploadedFile;

class BookForm extends Model {
    public $name;
    public $year;
    public $genre_id;
    public $author_id;
    public $image;
    public $page_count;
    public $description;

    public function rules()
    {
        return [
            [['name', 'year', 'genre_id', 'author_id', 'page_count', 'description'], 'required'],
            [['year', 'page_count'], 'integer'],
            [['name', 'author_id', 'description'], 'string'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function update($id = null)
    {
        if (!$this->validate()) {
            return null;
        }

        $book = $id ? Book::findOne($id) : null;

        if (!$book) {
            $book = new Book();
        }

        if ($this->image) {
            $this->image = UploadedFile::getInstance($this, 'image');
            $url = 'uploads/' . $this->image->name;

            $this->image->saveAs($url);
            $book->image = $url;
        }

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
