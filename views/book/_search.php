<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Genre;
use app\models\Author;

/* @var $this yii\web\View */
/* @var $model app\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name')->label('Название') ?>

    <?= $form->field($model, 'yearFrom')->label('Год публикации от') ?>

    <?= $form->field($model, 'yearTo')->label('Год публикации до') ?>

    <?= $form->field($model, 'genre_id')->dropDownList(
        ArrayHelper::map(Genre::find()->all(), 'id', 'name'),
        ['prompt' => 'Выберите жанр...'])->label('Жанр') ?>

    <?= $form->field($model, 'author_id')->dropDownList(
        ArrayHelper::map(Author::find()->all(), 'id', 'name'),
        ['prompt' => 'Выберите автора...'])->label('Автор') ?>

    <?= $form->field($model, 'pageFrom')->label('Кол-во страниц от') ?>

    <?= $form->field($model, 'pageTo')->label('Кол-во страниц до') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>