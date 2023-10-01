<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Библиотека'; ?>

<section class="book section">
    <? if (Yii::$app->user->identity): ?>
        <?= Html::tag('a', Html::encode('Добавить книгу'), ['href' => '/book/create']); ?>
    <? endif; ?>

    <? echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'year',
            'image',
            'genre_name',
            'author_name',
            'page_count',
            'description',
            'created_at:datetime',
        ],
    ]); ?>
</section>