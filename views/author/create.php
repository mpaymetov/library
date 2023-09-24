<?php
/**
 *
 */
use yii\helpers\Html;

$title = 'Добавить автор';
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Автор', 'url' => ['/author']];
$this->params['breadcrumbs'][] = ['label' => $title];

echo Html::beginTag('section', ['class' => 'author section']);
echo Html::beginTag('div', ['class' => 'container']);
echo Html::tag('h3', $title, []);
echo $this->render('_form', ['model' => $model]);
echo Html::endTag('div');
echo Html::endTag('section');