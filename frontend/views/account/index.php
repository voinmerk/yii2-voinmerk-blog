<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ваш профиль';
?>
<div class="account-index">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="sidebar">
					<?= $this->render('_sidebar-menu') ?>
				</div>
			</div>

			<div class="col-md-9">
				<div class="page-header">
					<h1>Ваш профиль</h1>
				</div>

				<div class="content">
					<div class="col-md-9">
						<?php $form = ActiveForm::begin(); ?>

						<?= $form->field($model, 'username')->textInput() ?>

						<?php ActiveForm::end(); ?>
					</div>

					<div class="col-md-3">
						<?= Html::img('@web/uploads/' . $user->avatar, ['class' => 'thumbnail', 'style' => 'width: 100%;']) ?>

						<?= Html::button('Сменить аватар', ['class' => 'btn btn-default', 'style' => 'width: 100%;']) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>