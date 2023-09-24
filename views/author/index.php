<?php

/** @var yii\web\View $this */

$this->title = 'Genres'; ?>

<section>

    <? foreach ($authors as $author): ?>
        <?php
        echo "<pre>";
        echo $author->name;
        echo "</pre>";
        ?>
    <? endforeach; ?>

</section>
