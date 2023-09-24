<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

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

    <header id="header" class="header">
        <div class="container header__container">
            <div class="header__logo-block">
                <a href="<?=Yii::$app->homeUrl?>"><?=Yii::$app->name?></a>
            </div>
            <nav class="navigation">
                <ul class="navigation__block">
                    <li class="navigation__item"><a href="/book" class="navigation__link">Книги</a></li>
                    <li class="navigation__item"><a href="/author" class="navigation__link">Авторы</a></li>
                    <li class="navigation__item"><a href="/genre" class="navigation__link">Жанры</a></li>
                    <? if (Yii::$app->user->isGuest): ?>
                        <li class="navigation__item"><a href="/login" class="navigation__link">Логин</a></li>
                    <? else: ?>
                        <li class="navigation__item">
                            <?
                            echo Html::beginForm(['/logout']);
                            echo Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'nav-link btn btn-link logout']);
                            echo Html::endForm();
                            ?>
                        </li>
                    <? endif; ?>
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
    
    <footer id="footer" class="footer">
        <div class="container footer__container">

            <div class="">&copy; <?= date('Y') ?></div>

        </div>
    </footer>
    
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>