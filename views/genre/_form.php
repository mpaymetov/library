<?php
/**
 *
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="genre-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name') ?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>