<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Все фрилансеры';
?>
<div class="user-index">
	<div class="container">
		<div class="page-header">
			<h1>Все фрилансеры</h1>
		</div>

		<div class="row">
			<div class="col-md-9">
				<div class="user-list">
					<?php foreach($users as $user) { ?>
					<div class="user-item">
						<?php // echo Html::img('@web/uploads/' . $user->avatar, ['class' => 'thumbnail', 'style' => 'width: 100%;']) ?>

						<?= Html::a($user->username, Url::to(['user/view', 'id' => $user->username])) ?>
					</div>
					<?php } ?>
				</div>
			</div>

			<div class="col-md-3">
				<h2>Фильтры</h2>
			</div>
		</div>
	</div>
</div>