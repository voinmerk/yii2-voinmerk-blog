<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Все резюме';
?>
<div class="resume-index">
	<div class="container">
		<div class="page-header">
			<h1>Все рюземе</h1>
		</div>

		<div class="row">
			<?php if(count($resumes)) { ?>
			<?php foreach($resumes as $resume) { ?>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title"><?= $resume['full_name'] ?></h2>
					</div>

					<div class="panel-body">
						<div class="col-lg-4">
							<?= Html::img($resume['image'], ['class' => 'thumbnail', 'style' => 'width: 100%;']) ?>
						</div>

						<div class="col-lg-8">
							<p><?= $resume['position'] ?></p>
						</div>
					</div>

					<div class="panel-footer clearfix">
						<?= Html::a('Просмотреть', ['resume/view', 'id' => $resume['slug']], ['class' => 'btn btn-default pull-right']) ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php } else { ?>
			<div class="alert alert-danger">
				<h2>Ошибка</h2>

				<p>В данном разделе ничего нет</p>
			</div>
			<?php } ?>
		</div>
	</div>
</div>