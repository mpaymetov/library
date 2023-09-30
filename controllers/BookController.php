<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Book;
use app\forms\BookForm;
use yii\web\NotFoundHttpException;
use yii\data\Sort;

class BookController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $sort = new Sort([
            'attributes' => [
                'year',
                'genre_id',
                'author_id',
                'name' => [
                    'asc' => ['name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'Name',
                ],
            ],
        ]);

        $query = Book::find()->with('genre', 'author');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
            ]);
        $books = $query->orderBy($sort->orders)->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', [
            'books' => $books,
            'pages' => $pages,
            'sort' => $sort,
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
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new BookForm;
        if ($model->load(Yii::$app->request->post())) {
            if ($book = $model->create()) {
                return $this->redirect(['view', 'id' => $book->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['view', 'id' => $id]);
        }

        $book = Book::findOne($id);
        $model = new BookForm;

        $model->name = $book->name;
        $model->year = $book->year;
        $model->author_id = $book->author_id;
        $model->genre_id = $book->genre_id;
        $model->page_count = $book->page_count;
        $model->description = $book->description;

        try {
            if ($model->load(Yii::$app->request->post())) {
                $book = $model->update($id);
                return $this->redirect(['view', 'id' => $book->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } catch (StaleObjectException $e) {
            throw new StaleObjectException('Error data version');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['view', 'id' => $id]);
        }

        $book = Book::findOne($id);
        $book->delete();

        return $this->redirect(['index']);
    }
}