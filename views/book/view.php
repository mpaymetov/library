<?php

/** @var yii\web\View $this */

//$this->title = 'My Yii Application';

$this->params['breadcrumbs'][] = ['label' => 'Книга', 'url' => ['/book']];

$name = $book->name;
$year = $book->year;
$genre = $book->genre->name;
$genreLink = \yii\helpers\Url::to(['genre/view', 'id' => $book->genre->id]);
$author = $book->author->name;
$authorLink = \yii\helpers\Url::to(['author/view', 'id' => $book->author->id]);
$description = $book->description;
$viewLink = \yii\helpers\Url::to(['book/view', 'id' => $book->id]);
$created = Yii::$app->formatter->asDate($book->created_at);

$this->title = $name;
?>

<h3><?=$name ?></h3>
<p><?=$year?> г.</p>
<p>Автор: <a href="<?=$authorLink?>"><?=$author?></a></p>
<p>Жанр: <a href="<?=$genreLink ?>"><?=$genre ?></a></p>
<p><?=$book->description ?></p>
<p>Добавлено: <?=$created?></p>