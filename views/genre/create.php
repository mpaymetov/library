<?php
/**
 *
 */
use yii\helpers\Html;

$title = 'Добавить жанр';
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Жанр', 'url' => ['/book']];
$this->params['breadcrumbs'][] = ['label' => $title];

echo Html::beginTag('section', ['class' => 'book section']);
echo Html::beginTag('div', ['class' => 'container']);
echo Html::tag('h3', $title, []);
echo $this->render('_form', ['model' => $model]);
echo Html::endTag('div');
echo Html::endTag('section');