<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?php if(isset($error_warning)) { ?>
        <div class="alert alert-danger">
            <p><?= $error_warning ?></p>
        </div>
        <?php } ?>

        <?= $form->field($blog, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($blog, 'preview_content')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'basic',
                'inline' => false,
            ],
        ]) ?>

        <?= $form->field($blog, 'content')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'standart',
                'inline' => false,
            ],
        ]) ?>

        <?= $form->field($blog, 'meta_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($blog, 'meta_keywords')->textarea(['rows' => 6]) ?>

        <?= $form->field($blog, 'meta_description')->textarea(['rows' => 6]) ?>

        <?= $form->field($blog, 'status')->dropDownList([0 => 'Не опубликовано', 1 => 'Опубликовано']) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
