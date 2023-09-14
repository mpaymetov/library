<?php

namespace app\controllers;

use yii\data\Pagination;
use yii\web\Controller;
use app\models\Book;

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
            'pageSize' => 1,
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
        $book = new Book;
        if ($book->load(Yii::$app->request->post()) && $book->save()) {
            return $this->redirect(['view', 'id' => $book->id]);
        } else {
            return $this->render('create', [
                'book' => $book,
            ]);
        }
    }
}