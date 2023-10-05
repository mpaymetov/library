<?php

/** @var yii\web\View $this */

use \yii\helpers\Url;

$name = $author->name;

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['/author']];
$this->params['breadcrumbs'][] = ['label' => $name];

$books = $author->getBooks()->all(); ?>

<section class="section author">
    <h1><?=$name?></h1>

    <div class="author__book-list">
        <? foreach ($books as $book): ?>
            <?
            $name = $book->name;
            $year = $book->year;
            $genre = $book->genre->name;
            $genreLink = Url::to(['genre/view', 'id' => $book->genre->id]);
            $pageCount = $book->page_count;
            $description = $book->description;
            $viewLink = Url::to(['book/view', 'id' => $book->id]);
            $created = Yii::$app->formatter->asDate($book->created_at);
            ?>
            <div class="author__book-item">
                <a href="<?=$viewLink?>"><h3><?=$name ?></h3></a>
                <p><?=$year?> г.</p>
                <p>Жанр: <a href="<?=$genreLink?>"><?=$genre ?></a></p>
                <p>Страниц: <?=$pageCount?></p>
                <p><?=$book->description ?></p>
                <p>Добавлено: <?=$created?></p>
            </div>
        <? endforeach; ?>
    </div>

</section>
