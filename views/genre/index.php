<?php

/** @var yii\web\View $this */

$this->title = 'Жанры';
$this->params['breadcrumbs'][] = ['label' => 'Жанры'];
?>

<section class="genre section">
    <? // <div class="container"> ?>
    <h1><?=$this->title?></h1>
    <div class="genre__list">
        <? foreach ($genres as $genre):
            $name = $genre->name;
            $link = \yii\helpers\Url::to(['genre/view', 'id' => $genre->id]);
            ?>
            <div class="genre__item">
                <a class="genre__link" href="<?=$link?>"><?=$name?></a>
            </div>
        <? endforeach; ?>
    </div>

    <? if (Yii::$app->user->identity): ?>
        <div class="genre__bottom-block">
            <a href="/genre/create" class="genre__link">Добавить жанр</a>
        </div>
    <? endif; ?>
    <? // </div> ?>
</section>
