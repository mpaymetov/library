<?php

/** @var yii\web\View $this */

//$this->title = 'My Yii Application';
$name = $author->name;

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['/author']];

$books = $author->getBooks()->all(); ?>

    <h1><?=$name?></h1>

    <section>
        <div class="card">
            <? foreach ($books as $book): ?>
                <?
                $name = $book->name;
                $year = $book->year;
                $genre = $book->genre->name;
                $genreLink = \yii\helpers\Url::to(['genre/view', 'id' => $book->genre->id]);
                $author = $book->author->name;
                //$authorLink = \yii\helpers\Url::to(['author/view', 'id' => $book->author->id]);
                $pageCount = $book->page_count;
                $description = $book->description;
                $viewLink = \yii\helpers\Url::to(['book/view', 'id' => $book->id]);
                $created = Yii::$app->formatter->asDate($book->created_at);
                ?>
                <div>
                    <a href="<?=$viewLink?>"><h3><?=$name ?></h3></a>
                    <p><?=$year?> г.</p>
                    <p>Автор: <?=$author?></p>
                    <p>Жанр: <a href="<?=$genreLink?>"><?=$genre ?></a></p>
                    <p>Страниц: <?=$pageCount?></p>
                    <p><?=$book->description ?></p>
                    <p>Добавлено: <?=$created?></p>
                </div>
            <? endforeach; ?>
        </div>

        <? /*<div class="pagination">
        <div class="nav-links">
        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $pages
        ]) ?>
        </div>
    </div> */ ?>

    </section>

<?php echo "</pre>";