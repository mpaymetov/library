<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Author;
use app\forms\AuthorForm;

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

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['author/index']);
        }

        $model = new AuthorForm;
        if ($model->load(Yii::$app->request->post())) {
            if ($author = $model->create()) {
                return $this->redirect(['author/view', 'id' => $author->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}