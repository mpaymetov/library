<?php
/**
 *
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Genre;
use app\models\Author;
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'year') ?>
    <?= $form->field($model, 'genre_id')->dropDownList(
            ArrayHelper::map(Genre::find()->all(), 'id', 'name'),
            ['prompt' => 'Выберите жанр...']) ?>
    <?= $form->field($model, 'author_id')->dropDownList(
            ArrayHelper::map(Author::find()->all(), 'id', 'name'),
            ['prompt' => 'Выберите автора...']) ?>
    <?= $form->field($model, 'page_count') ?>
    <?= $form->field($model, 'description') ?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>