<?php
/**
 *
 */
use yii\helpers\Html;

echo Html::beginTag('div', ['class' => 'book']);
echo Html::tag('h3', 'Добавить книгу', []);
echo $this->render('_form', ['model' => $model]);
echo Html::endTag('div');
