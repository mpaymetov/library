<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book;
use app\forms\BookForm;
use yii\web\NotFoundHttpException;
use yii\data\SqlDataProvider;

class BookController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM book')->queryScalar();
        $sqlQuery = "SELECT book.*, genre.name AS genre_name, author.name AS author_name FROM book LEFT JOIN genre ON book.genre_id = genre.id LEFT JOIN author ON book.author_id = author.id";

        $sort = [
            'attributes' => [
                'year',
                'created_at',
                'genre_name',
                'author_name',
                'name',
            ],
        ];

        $dataProvider = new SqlDataProvider([
            'sql' => $sqlQuery,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 4,
            ],
            'sort' => $sort,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
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