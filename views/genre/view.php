<?php

/** @var yii\web\View $this */

use \yii\helpers\Url;

$name = $genre->name;

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => 'Жанры', 'url' => ['/genre']];
$this->params['breadcrumbs'][] = ['label' => $name];

$books = $genre->getBooks()->all(); ?>

<h1><?=$name?></h1>

<section>
    <div class="card">
        <? foreach ($books as $book): ?>
            <?
            $name = $book->name;
            $year = $book->year;
            $author = $book->author->name;
            $authorLink = Url::to(['author/view', 'id' => $book->author->id]);
            $pageCount = $book->page_count;
            $description = $book->description;
            $viewLink = Url::to(['book/view', 'id' => $book->id]);
            $created = Yii::$app->formatter->asDate($book->created_at);
            ?>
            <div>
                <a href="<?=$viewLink?>"><h3><?=$name ?></h3></a>
                <p><?=$year?> г.</p>
                <p>Автор: <a href="<?=$authorLink?>"><?=$author?></a></p>
                <p>Страниц: <?=$pageCount?></p>
                <p><?=$description ?></p>
                <p>Добавлено: <?=$created?></p>
            </div>
        <? endforeach; ?>
    </div>

</section>
