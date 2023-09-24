<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Genre;

class GenreController extends Controller
{
    public function actionIndex()
    {
        $genres = Genre::find()->all();

        if ($genres === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('index', [
            'genres' => $genres,
        ]);
    }

    public function actionView($id)
    {
        $genre = Genre::findOne($id);
        if ($genre === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'genre' => $genre
        ]);
    }
}