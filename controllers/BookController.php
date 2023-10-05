<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Book;
use app\models\BookSearch;
use app\forms\BookForm;

class BookController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Book::find()->with('genre', 'author');

        $sort = [
            'attributes' => [
                'id',
                'name',
                'year',
                'page_count',
                'created_at',
            ],
        ];

        $pagination = [
            'pageSize' => 4,
        ];

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort,
            'pagination' => $pagination,
        ]);

        $searchModel = new BookSearch();
        if (Yii::$app->request->get()) {
            $dataProvider = $searchModel->search(Yii::$app->request->get());
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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