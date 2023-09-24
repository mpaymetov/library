<?php

/** @var yii\web\View $this */

$this->title = 'Genres'; ?>

<section>

<? foreach ($genres as $genre): ?>
<?php
echo "<pre>";
echo $genre->name;
echo "</pre>";
?>
<? endforeach; ?>

</section>
