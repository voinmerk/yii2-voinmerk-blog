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
$('.ajax-popup').magnificPopup({
	type: 'ajax',
	alignTop: true,
	overflowY: 'scroll'
});
JS;

$this->registerJs($js);

$this->title = 'Резюме - ' . $resume['full_name'] . ', ' . $resume['position'];
?>
<div class="resume-view">
	<div class="container">
		<div class="page-header">
			<h1>Резюме <?= $resume['full_name'] ?></h1>
		</div>

		<!-- <div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						<pre><?php //echo var_dump($resume) ?></pre>
					</div>
				</div>
			</div>
		</div> -->

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
							<h4>Зарплата: <?= !$resume['salary'] ? 'Договорная' : $resume['salary'] . ' руб.' ?></h4>

							<p>Категория: <?= $resume['category'] ?></p>

							<p>Место работы: <?= $resume['city'] ?></p>
							
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

						<?php if(count($resume['resumeExperiences'])) { ?>
						<?php foreach($resume['resumeExperiences'] as $experience) { ?>
						<div class="col-lg-3">
							<p><?= $experience['start_date'] . ' — ' . $experience['end_date'] ?></p>
							<p>1 год 5 месяцев</p>
						</div>

						<div class="col-lg-9">
							<p><?= $experience['position'] ?></p>
							<p><?= $experience['organization'] . ', ' . $experience['city'] ?></p>
						</div>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						<h2>Образование</h2>

						<?php if(count($resume['resumeEducations'])) { ?>
						<?php foreach($resume['resumeEducations'] as $education) { ?>
						<div class="col-lg-3">
							<p><?= $education['start_date'] . ' — ' . $education['end_date'] ?></p>
						</div>

						<div class="col-lg-9">
							<p><?= $education['profession'] ?></p>
							<p><?= $education['faculty'] ?></p>
							<p><?= $education['institute'] . ', ' . $education['city'] ?></p>
						</div>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Профессиональные навыки</h2>

					<div class="col-lg-12">
						<?php foreach($resume['resumeSkills'] as $skill) { ?>
						<p class="label label-success"><?= $skill['content'] ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>О себе</h2>

					<div class="col-lg-12">
						<?= $resume['biography'] ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Портфолио</h2>

					<?php if(count($resume['resumePortfolios'])) { ?>
					<?php foreach($resume['resumePortfolios'] as $portfolio) { ?>
					<div class="col-lg-4">
	                    <div class="card clearfix">
	                        <h4><?= $portfolio['title'] ?></h4>

	                        <?= $portfolio['preview'] ?>

	                        <p><?= Html::a(Html::img('@web/' . $portfolio['image'], ['style' => 'width: 100%;']), '@web/' . $portfolio['image'], ['class' => 'image-popup-no-margins']) ?></p>

	                        <!-- <p><a class="btn btn-link pull-right" href="<?= $portfolio['site_link'] ?>" target="_blank">Просмотреть &raquo;</a></p> -->

	                        <p><?= Html::a('Просмотреть &raquo;', Url::to(['portfolio/view', 'id' => $portfolio['slug']]), ['class' => 'ajax-popup btn btn-link pull-right']) ?></p>
	                    </div>
	                </div>
	            	<?php } ?>
	            	<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>