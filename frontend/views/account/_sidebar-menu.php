<?php

use yii\helpers\Html;
use yii\widgets\Menu;

$menuItems = [
	['label' => 'Меню', 		 					'options' => ['class' => 'list-group-item menu-item-header']],
	['label' => 'Профиль', 		'url' => ['account/index'],		'options' => ['class' => 'list-group-item']],
    ['label' => 'Резюме', 		'url' => ['account/resume'],	'options' => ['class' => 'list-group-item']],
    ['label' => 'Портфолио', 	'url' => ['account/portfolio'],	'options' => ['class' => 'list-group-item']],
    ['label' => 'Услуги', 		'url' => ['account/service'],	'options' => ['class' => 'list-group-item']],
    ['label' => 'Настройки', 	'url' => ['account/setting'],	'options' => ['class' => 'list-group-item']],
];

echo Menu::widget([
    'items' => $menuItems,
	'options' => [
		'id' => 'account-menu',
		'class' => 'list-group',
	],
]);
?>