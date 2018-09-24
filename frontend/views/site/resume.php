<?php

use yii\helpers\Html;
use yii\helpers\Url;

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

$this->title = 'Резюме - Кремнёв Евгений';
?>
<div class="site-resume">
	<div class="container">
		<div class="page-header">
			<h1>Моё резюме</h1>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-4">
						<?= Html::a(Html::img('https://pp.userapi.com/c637923/v637923115/c834/0vp9r1NDEk0.jpg', ['style' => 'width: 100%;']), 'https://pp.userapi.com/c637923/v637923115/c834/0vp9r1NDEk0.jpg', ['class' => 'image-popup-no-margins']) ?>
					</div>

					<div class="col-lg-8">
						<h2>Евгений Кремнёв</h2>

						<p>Мужчина, 22 года, 19 февраля 1996 год.</p>

						<p>Новосибирск</p>

						<p><i class="fa fa-phone"></i> +7 (999) 463-94-41</p>

						<p><i class="fa fa-envelope"></i> <a href="mailto:kremniov96@gmail.com">kremniov96@gmail.com</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						<h2>Junior-разработчик</h2>

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
	                        <h4>НППК</h4>

	                        <p>Разработан на Yii2 Framework (шаблон advanced). Сайт для сенсорного киоска Новосибирского профессионально-педагогического колледжа.</p>

	                        <!-- <p>Включает в себя frontend и backend. Были перенастроены компоненты AdminLte, CKEditor, UrlManager, Gii (CRUD), связаны все модели данных. Сайт мультиязычный, имеет уже два языка, есть возможность дополнить через админ-панель в разделе "Локализация".</p>

	                        <p>Frontend часть включает в себя раздел "Блог", где главная страница раздела - это "Новости", последующие простые страницы с содержимым. Так же присутствуют разделы: расписание занятий, список груп, информация об аудиториях и о сотрудниках (администрация и преподаватели). По требованию министерства образования была разработана панель для слабовидящих. Данная панель позволяет просмотривать содержимое в четырёх цветовых контрастах (черный, белый, синий и коричневый), а так же увиличивать шрифты и скрывать изображения в разделе блога.</p>

	                        <p>Главная страница отвечает исключительно за баннеры, несущее в себе информацию о колледже и ближайших мероприятиях.</p> -->

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