<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Genre;
use app\forms\GenreForm;

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

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['genre/index']);
        }

        $model = new GenreForm;
        if ($model->load(Yii::$app->request->post())) {
            if ($genre = $model->create()) {
                return $this->redirect(['genre/view', 'id' => $genre->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}