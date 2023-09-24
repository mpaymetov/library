<?php

/** @var yii\web\View $this */

$this->title = 'Библиотека'; ?>



<section class="book section">
    <? // <div class="container"> ?>
    <div class="">
        <a href="/book/create" class="">Добавить книгу</a>
    </div>

    <div class="book__list">
        <? foreach ($books as $book): ?>
            <?
            $name = $book->name;
            $year = $book->year;
            $genre = $book->genre->name;
            $genreLink = \yii\helpers\Url::to(['genre/view', 'id' => $book->genre->id]);
            $author = $book->author->name;
            $authorLink = \yii\helpers\Url::to(['author/view', 'id' => $book->author->id]);
            $pageCount = $book->page_count;
            $description = $book->description;
            $viewLink = \yii\helpers\Url::to(['book/view', 'id' => $book->id]);
            $created = Yii::$app->formatter->asDate($book->created_at);
            ?>
            <div class="book__card">
                <a href="<?=$viewLink?>"><h3><?=$name ?></h3></a>
                <p><?=$year?> г.</p>
                <p>Автор: <a href="<?=$authorLink?>"><?=$author?></a></p>
                <p>Жанр: <a href="<?=$genreLink ?>"><?=$genre ?></a></p>
                <p>Страниц: <?=$pageCount?></p>
                <p><?=$book->description ?></p>
                <p>Добавлено: <?=$created?></p>
            </div>
        <? endforeach; ?>
    </div>

    <div class="">
        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $pages
        ]) ?>
    </div>
    <? // </div> ?>
</section>