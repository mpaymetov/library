<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Библиотека'; ?>

<section class="book section">
    <? if (Yii::$app->user->identity) {
        echo Html::tag('a', Html::encode('Добавить книгу'), ['href' => '/book/create']);
    } ?>

    <?= $this->render('_search', ['model' => $searchModel]) ?>

    <?
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'name',
                'label' => 'Название',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::tag('a', $data->name, ['href' => '/book/' . $data->id] );
                },
            ],
            'year',
            [
                'attribute' => 'genre',
                'label' => 'Жанр',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::tag('a', $data->genre->name, ['href' => '/genre/' . $data->genre_id] );
                },
            ],
            [
                'attribute' => 'author',
                'label' => 'Писатель',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::tag('a', $data->author->name, ['href' => '/author/' . $data->author_id] );
                },
            ],
            'page_count',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img($data->image ?: 'uploads/book-no-image.jpg', ['style' => 'width: 100px; height: auto;']);
                },
            ],
            [
                'attribute' => 'description',
                'label' => 'Описание',
                'format' => 'text',
                'value' => function ($data) {
                    return mb_strimwidth($data->description, 0, 100, "...");
                },
            ],
            'created_at:date',
        ],
    ]); ?>
</section>