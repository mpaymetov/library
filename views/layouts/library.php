<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <base href="/web/">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    
    <header id="header">
        <div class="container">
            <div class="logo">
                <a href="/">Библиотека</a>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/book">Книги</a></li>
                    <li><a href="/author">Авторы</a></li>
                    <li><a href="/genre">Жанры</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?//= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
    
    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; MPaymetov <?= date('Y') ?></div>
    
            </div>
        </div>
    </footer>
    
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>