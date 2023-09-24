<?php

namespace app\forms;

use yii\base\Model;
use app\models\Author;

class AuthorForm extends Model {
    public $name;

    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    public function create()
    {
        if (!$this->validate()) {
            return null;
        }

        $authorCheck = Author::find()->where(['name' => $this->name])->one();
        if ($authorCheck != null) {
            return $authorCheck;
        }

        $author = new Author();
        $author->name = $this->name;

        if ($author->save()) {
            return $author;
        } else {
            return null;
        }
    }
}