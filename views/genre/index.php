<?php

/** @var yii\web\View $this */

$this->title = 'Genres'; ?>

<section class="genre section">
    <? // <div class="container"> ?>
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
    <? // </div> ?>
</section>
