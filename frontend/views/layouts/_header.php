<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use rmrevin\yii\fontawesome\Fa;

?>

<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);

$menuItems = [
    ['label' => 'Блог', 'url' => ['/blog/index']],
    ['label' => 'Фрилансеры', 'url' => ['/user/index']],
    ['label' => 'Резюме', 'url' => ['/resume/index']],
    ['label' => 'О проекте', 'url' => ['/site/about']],
    ['label' => 'Контакты', 'url' => ['/site/contact']],
];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItems,
]);

$menuItems = [];

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Регистрация', 'url' => ['/auth/signup']];
    $menuItems[] = ['label' => 'Вход', 'url' => ['/auth/login']];
} else {
    $user = Yii::$app->user->identity;

    $menuItems[] = [
        'label' => $user->first_name . ' ' . $user->last_name,
        'items' => [
            ['label' => Fa::icon('user') . ' Профиль', 'url' => ['account/index']],
            ['label' => Fa::icon('file') . ' Резюме', 'url' => ['account/resume']],
            ['label' => Fa::icon('th') . ' Портфолио', 'url' => ['account/portfolio']],
            ['label' => Fa::icon('code-fork') . ' Услуги', 'url' => ['account/service']],
            ['label' => Fa::icon('cog') . ' Настройки', 'icon'=> 'cog', 'url' => ['account/setting']],
            '<li class="divider"></li>',
            ['label' => Fa::icon('sign-out') . ' Выход', 'url' => ['auth/logout'], 'linkOptions' => ['data-method' => 'post']],
            //'<li class="dropdown-header">Dropdown Header</li>',
            /*'<li>'
            . Html::beginForm(['/auth/logout'], 'post')
            . Html::submitButton('Выход', ['class' => 'btn btn-link logout'])
            . Html::endForm()
            . '</li>',*/
        ],    ];
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => $menuItems,
]);
NavBar::end();
?>