<?php

/** @var yii\web\View $this */

$this->title = 'Авторы'; ?>

<section class="section author">
    <? // <div class="container"> ?>
    <? foreach ($authors as $author):
        $name = $author->name;
        $link = \yii\helpers\Url::to(['author/view', 'id' => $author->id]);
        ?>
        <div class="author__item">
            <a href="<?=$link?>" class="author__link"><?=$name?></a>
        </div>
    <? endforeach; ?>
    <? // </div> ?>
</section>
