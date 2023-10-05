<?php

/** @var yii\web\View $this */

use \yii\helpers\Url;

$title = 'Авторы';
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => $title];
?>

<section class="section author">
    <h1><?=$title?></h1>

    <div class="author__list">
        <? foreach ($authors as $author):
            $name = $author->name;
            $link = Url::to(['author/view', 'id' => $author->id]);
            ?>
            <div class="author__item">
                <a href="<?=$link?>" class="author__link"><?=$name?></a>
            </div>
        <? endforeach; ?>
    </div>

    <? if (Yii::$app->user->identity): ?>
        <div class="author__bottom-block">
            <a href="/author/create" class="author__link">Добавить автора</a>
        </div>
    <? endif; ?>
</section>
