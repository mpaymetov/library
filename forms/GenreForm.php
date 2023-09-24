<?php

namespace app\forms;

use yii\base\Model;
use app\models\Genre;

class GenreForm extends Model {
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

        $genreCheck = Genre::find()->where(['name' => $this->name])->one();
        if ($genreCheck != null) {
            return $genreCheck;
        }

        $genre = new Genre();
        $genre->name = $this->name;

        if ($genre->save()) {
            return $genre;
        } else {
            return null;
        }
    }
}