<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Blog',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="blog-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
