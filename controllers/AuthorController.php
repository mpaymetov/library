<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Author;

class AuthorController extends Controller
{
    public function actionIndex()
    {
        $authors = Author::find()->all();

        if ($authors === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('index', [
            'authors' => $authors,
        ]);
    }

    public function actionView($id)
    {
        $author = Author::findOne($id);
        if ($author === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'author' => $author
        ]);
    }
}