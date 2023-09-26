<?php
/** @var yii\web\View $this */

$id  = $book->id;
$name = $book->name;
$year = $book->year;
$imageUrl = $book->image ?: "uploads/book-no-image.jpg";
$genre = $book->genre->name;
$genreLink = \yii\helpers\Url::to(['genre/view', 'id' => $book->genre->id]);
$author = $book->author->name;
$authorLink = \yii\helpers\Url::to(['author/view', 'id' => $book->author->id]);
$pageCount = $book->page_count;
$description = $book->description;
$viewLink = \yii\helpers\Url::to(['book/view', 'id' => $book->id]);
$created = Yii::$app->formatter->asDate($book->created_at);

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => 'Книга', 'url' => ['/book']];
$this->params['breadcrumbs'][] = ['label' => $name];
?>

<section class="book section">
    <div class="book__page">
        <h3><?=$name ?></h3>
        <div>
            <div>
                <img src="<?=$imageUrl ?>" alt="">
            </div>
            <div>
                <p><?=$year?> г.</p>
                <p>Автор: <a href="<?=$authorLink?>"><?=$author?></a></p>
                <p>Жанр: <a href="<?=$genreLink ?>"><?=$genre ?></a></p>
                <p>Страниц: <?=$pageCount?></p>
                <p><?=$description ?></p>
                <p>Добавлено: <?=$created?></p>
            </div>
        </div>
    </div>

    <? if (Yii::$app->user->identity): ?>
        <div class="book__bottom-block">
            <a href="/book/update/<?=$id?>" class="book__btn">Изменить</a>
            <a href="/book/delete/<?=$id?>" class="book__btn">Удалить</a>
        </div>
    <? endif; ?>
</section>