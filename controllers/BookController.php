<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Book;
use app\models\Genre;
use app\forms\CreateForm;

class BookController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$books = Book::find()->all();
        $query = Book::find()->with('genre', 'author');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 2,
            'forcePageParam' => false,
            'pageSizeParam' => false
            ]);
        $books = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', [
            'books' => $books,
            'pages' => $pages
        ]);
    }

    public function actionView($id)
    {
        $book = Book::findOne($id);
        if ($book === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'book' => $book
        ]);
    }

    public function actionCreate()
    {
        $model = new CreateForm;
        if ($model->load(Yii::$app->request->post())) {
            if ($book = $model->create()) {
                return $this->redirect(['book/view', 'id' => $book->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}