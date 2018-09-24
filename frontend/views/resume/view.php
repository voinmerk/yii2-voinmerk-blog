<?php

use yii\helpers\Url;
use yii\helpers\Html;

$js = <<<JS
$('.image-popup-no-margins').magnificPopup({
	type: 'image',
	closeOnContentClick: true,
	closeBtnInside: false,
	fixedContentPos: true,
	mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
	image: {
		verticalFit: true
	},
	zoom: {
		enabled: true,
		duration: 300 // don't foget to change the duration also in CSS
	}
});
JS;

$this->registerJs($js);

$this->title = 'Резюме - ' . $resume['full_name'];
?>
<div class="resume-view">
	<div class="container">
		<div class="page-header">
			<h1>Резюме <?= $resume['full_name'] ?>, <?= $resume['position'] ?></h1>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-4">
						<?= Html::a(Html::img($resume['image'], ['style' => 'width: 100%;']), $resume['image'], ['class' => 'image-popup-no-margins']) ?>
					</div>

					<div class="col-lg-8">
						<h2><?= $resume['full_name'] ?></h2>

						<p><?= $resume['gender'] ?>, <?= $resume['age'] ?> года, <?= $resume['birth_date'] ?>.</p>

						<p><?= $resume['city'] ?></p>

						<p><i class="fa fa-phone"></i> <?= $resume['phone'] ?></p>

						<p><i class="fa fa-envelope"></i> <a href="mailto:<?= $resume['email'] ?>"><?= $resume['email'] ?></a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						<h2><?= $resume['position'] ?></h2>

						<div class="col-lg-12">
							<h4>Зарплата: договорная</h4>

							<p>Категория: ИТ и Интернет, Веб-разработка</p>

							<p>Место работы: Новосибирск.</p>
							
							<p>Опыт: 1,5 года</p>

							<p>Дополнительно: Готов к командировкам</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						<h2>Опыт работы</h2>

						<div class="col-lg-3">
							<p>Май 2017 — настоящее время</p>
							<p>1 год 5 месяцев</p>
						</div>

						<div class="col-lg-9">
							<p>Техник-программист</p>
							<p>ГБПОУ НСО "НОВОСИБИРСКИЙ ПРОФЕССИОНАЛЬНО-ПЕДАГОГИЧЕСКИЙ КОЛЛЕДЖ", Новосибирск</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						<h2>Образование</h2>

						<div class="col-lg-3">
							<p>2018 — настоящее время</p>
						</div>

						<div class="col-lg-9">
							<p>Иформационные технологии</p>
							<p>Факультет Технологий и Предпринимателства, Очно-заочная</p>
							<p>НГПУ, Новосибирск</p>
						</div>

						<div class="col-lg-3">
							<p>2011 — 2016</p>
						</div>

						<div class="col-lg-9">
							<p>Прикладная информатика</p>
							<p>Информационнве технологии, Очная</p>
							<p>НППК, Новосибирск</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Профессиональные навыки</h2>

					<div class="col-lg-12">
						<p class="label label-success">Работаю с реляционными базами данных, такими как MySQL, MSSQL, PostgreSQL и MariaDB.</p>
						<p class="label label-success">Знание ООП в php 5.6 и выше.</p>
						<p class="label label-success">Основы работы с JavaScript и JQuery.</p>
						<p class="label label-success">В своих проектах использую composer (пакетный менеджер) и git (систему управления версиями).</p>
						<p class="label label-success">Для размещения репозиториев использую GitHub и VisualStudio.</p>
						<p class="label label-success">Умение работать с мобильной вёрсткой используя Bootstrap 3 или 4, Foundation Framework.</p>
						<p class="label label-success">Имею опыт командной разработки.</p>
						<p class="label label-success">Есть опыт работы с UNIX-системами и их администрированием в локальной сети предприятия.</p>
						<p class="label label-success">В своих проектах использовал Drupal, Wordpress, Yii, Laravel, XenForo и OpenCart.</p>
						<p class="label label-success">Имею навыки администрирование и проектирование баз данных.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>О себе</h2>

					<div class="col-lg-12">
						<p>Желаю работать в команде над крупными веб-проектами. Хочу и буду развиваться в этой сфере. За 2 года изучения веб-программирования успел принять участие в нескольких проектах и разработать несколько тематических сайтов. Сейчас моя цель официально трудоустроиться, набраться опыта и стать настоящим профессионалом своего дела.</p>

						<p>Есть конечно отрицательные качества над которыми работаю каждый день, ибо мне ничто не должно мешать идти к своей цели.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Портфолио</h2>

					<div class="col-lg-4">
	                    <div class="card clearfix">
	                        <h4>ТД ЮГ-элеватор</h4>

	                        <p>Разработка сайта для особо крупной компании в украине. ЮГ Элеватор - завод элеваторного оборудования. Сайт был разработан на платформе wordpress.</p>

	                        <p><?= Html::a(Html::img('@web/img/td-ugelevator-home.jpg', ['style' => 'width: 100%;']), '@web/img/td-ugelevator-home.jpg', ['class' => 'image-popup-no-margins']) ?></p>

	                        <p><a class="btn btn-link pull-right" href="http://td-ugelevator.com" target="_blank">Просмотреть &raquo;</a></p>
	                    </div>
	                </div>
	                <div class="col-lg-4">
	                    <div class="card clearfix">
	                        <h4>NPPK54 - Сайт</h4>

	                        <p>Разработан на Yii2 Framework. Сайт для информационной доски Новосибирского профессионально-педагогического колледжа.</p>

	                        <p><?= Html::a(Html::img('@web/img/nppk-home.png', ['style' => 'width: 100%;']), '@web/img/nppk-home.png', ['class' => 'image-popup-no-margins']) ?></p>

	                        <p><a class="btn btn-link pull-right" href="http://info.nppk54.ru" target="_blank">Просмотреть &raquo;</a></p>
	                    </div>
	                </div>
	                <div class="col-lg-4">
	                    <div class="card clearfix">
	                        <h4>Cristalix Project</h4>

	                        <p>Разработан на форумной платформе Xenforo 1.4.3</p>

	                        <p><?= Html::a(Html::img('@web/img/cristalix-home.jpg', ['style' => 'width: 100%;']), '@web/img/cristalix-home.jpg', ['class' => 'image-popup-no-margins']) ?></p>

	                        <p><a class="btn btn-link pull-right" href="http://xenforo.cristalix.voinmerk.ru" target="_blank">Просмотреть &raquo;</a></p>
	                    </div>
	                </div>
	                <div class="col-lg-4">
	                    <div class="card clearfix">
	                        <h4>Amazonia RP - Сайт</h4>

	                        <p>Разработан на движке Yii2 Framework. Сайт, пока мало известного игрового проекта.</p>

	                        <p><?= Html::a(Html::img('@web/img/amazonia-home.png', ['style' => 'width: 100%;']), '@web/img/amazonia-home.png', ['class' => 'image-popup-no-margins']) ?></p>

	                        <p><a class="btn btn-link pull-right" href="http://yii.amazonia.voinmerk.ru" target="_blank">Просмотреть &raquo;</a></p>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>