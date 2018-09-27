<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

use rmrevin\yii\fontawesome\FontAwesome as Fa;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Blogs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index box box-primary">
    <div class="box-header with-border">
        <?= $this->render('@viewPartial/header-box', [
            'title' => Yii::t('backend', 'Blog list'),
            'action_create' => Url::to(['blog/create']),
            'action_copy' => Url::to(['blog/copy-rows']),
            'action_delete' => Url::to(['blog/delete-rows']),
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'name' => 'id',
                    'checkboxOptions' => function($model) {
                        return [
                            'onchange' => '
                               var keys = $("#grid").yiiGridView("getSelectedRows");
                               $(this).parent().parent().toggleClass("danger")
                            ',
                            'value' => $model->id,
                        ];
                    }
                ],
                'title:text',
                'createdName:text',
                [
                    'label' => Yii::t('backend', 'Status'),
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' => function($model) {
                        $class = $model->status ? ' label-success' : ' label-danger';
                        $name = $model->statusName;

                        return '<span class="label' . $class . '">' . $name . '</span>';
                    },
                    'filter' => \backend\models\Blog::getStatusList(),
                ],
                'updated_at:datetime',
                /*[
                    'attribute'=>'updated_at',
                    'format' => 'datetime',
                    'filter' => \nkovacs\datetimepicker\DateTimePicker::widget([
                        'model' => $searchModel,
                        'value' => $searchModel->updated_at,
                        'attribute' => 'updated_at',
                        'type' => 'updated_at',
                        'format' => 'php:YYYY-MM-DD HH:mm',
                        //'extraFormats' => ['YYYY-MM-DD HH:mm'],
                    ]),
                ],*/
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => Yii::t('backend', 'Actions'),
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a(Fa::icon('eye'), $url, ['class' => 'btn btn-primary btn-flat', 'title' => Yii::t('yii', 'View'), 'data-toogle' => 'tooltip']);
                        },
                        'update' => function ($url, $model) {
                            return Html::a(Fa::icon('pencil'), $url, ['class' => 'btn btn-warning btn-flat', 'title' => Yii::t('yii', 'Update'), 'data-toogle' => 'tooltip']);
                        },
                    ],
                    'headerOptions' => ['class' => 'text-right'],
                    'contentOptions' => ['class' => 'text-right'],
                ],
            ],
        ]); ?>
    </div>
</div>
