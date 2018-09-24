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
						<div class="panel-title">
							<h2><?= $resume['full_name'] ?></h2>
						</div>
					</div>

					<div class="panel-body">

						<?= Html::a('Просмотреть', ['resume/view', 'id' => $resume['id']], ['class' => 'btn btn-default']) ?>
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