<?php
/**
 *
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'year') ?>
    <?= $form->field($model, 'genre') ?>
    <?= $form->field($model, 'author') ?>
    <?= $form->field($model, 'page_count') ?>
    <?= $form->field($model, 'description') ?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>