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

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'name')->label('Название') ?>

        <?= $form->field($model, 'year')->label('Год публикации') ?>

        <?= $form->field($model, 'image')->fileInput()->label('Обложка книги') ?>

        <?= $form->field($model, 'genre_id')->dropDownList(
                ArrayHelper::map(Genre::find()->all(), 'id', 'name'),
                ['prompt' => 'Выберите жанр...'])->label('Жанр') ?>

        <?= $form->field($model, 'author_id')->dropDownList(
                ArrayHelper::map(Author::find()->all(), 'id', 'name'),
                ['prompt' => 'Выберите автора...'])->label('Автор') ?>

        <?= $form->field($model, 'page_count')->label('Кол-во страниц') ?>

        <?= $form->field($model, 'description')->label('Описание') ?>

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>