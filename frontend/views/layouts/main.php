    
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\models\Profile;
use common\widgets\Alert;
use frontend\models\SignupForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
    body{
        background-color: #000000;
    }
    h1{
        color:white;
    }
   
    #w1{
        background-color:#000000;    
    }
    
</style>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Клиент', 'url' => ['/klient-user']],
        ['label' => 'Помощь', 'url' => ['/help']],
            // ['label' => 'О нас', 'url' => ['/site/about']],
        // ['label' => 'Контакты', 'url' => ['/site/contact']],
        
    ];
    
    if(SignupForm::hasRole(2)){ $menuItems[] = 
        ['label' => 'Админка', 'items' => [
            ['label' => 'Недвижимость', 'url' => ['/property']],
            ['label' => 'Контракт', 'url' => ['/contract']],
            ['label' => 'Сотрудники', 'url' => ['/sotrudniki']],
            ['label' => 'Клиент', 'url' => ['/klient']],
            ['label' => 'Покупатель', 'url' => ['/buy']],
            ['label' => 'Операции', 'url' => ['/operations']],
            ['label' => 'Роли', 'url' => ['/role']],
            ['label' => 'Пользователи', 'url' => ['/user-role']],
        ]];
    }        
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
    } 
    else{
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход в окно (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }  
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
