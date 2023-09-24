<?php
/**
 *
 */
use yii\helpers\Html;

echo Html::beginTag('section', ['class' => 'book section']);
echo Html::beginTag('div', ['class' => 'container']);
echo Html::tag('h3', 'Добавить книгу', []);
echo $this->render('_form', ['model' => $model]);
echo Html::endTag('div');
echo Html::endTag('section');
