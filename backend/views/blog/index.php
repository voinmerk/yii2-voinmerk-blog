<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Blogs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('backend', 'Create Blog'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
                    'checkboxOptions' => function(){
                        return [
                            'onchange' => '
                               var keys = $("#grid").yiiGridView("getSelectedRows");
                               $(this).parent().parent().toggleClass("danger")
                            '
                        ];
                    }
                ],
                'title',
                'content:ntext',
                [
                    'label' => 'Статус',
                    'attribute' => 'status',
                    'value' => 'status',
                ],
                [
                    'label' => 'Автор',
                    'attribute' => 'created_by',
                    'value' => 'createdBy.username',
                ],
                'updated_at:datetime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    // 'label' => 'Действие',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a(Fa::icon('eye'), $url, ['class' => 'btn btn-primary']);
                        },
                        'update' => function ($url, $model) {
                            return Html::a(Fa::icon('pencil'), $url, ['class' => 'btn btn-warning']);
                        },
                        /*'delete' => function ($url, $model) {
                            return Html::a(Fa::icon('trash-o'), $url, ['class' => 'btn btn-danger']);
                        },*/
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>
