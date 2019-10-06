<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => [
        'enctype' => 'multipart/form-data',
    ]]); ?>

    <?= $form->field($model, 'category_id')->dropDownList([$categories]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
        ]); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($fileModel, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'hit')->radioList([
        '1' => 'Да',
        '0' => 'Нет',
    ]) ?>

    <?= $form->field($model, 'new')->radioList([
        '1' => 'Да',
        '0' => 'Нет',
    ]) ?>

    <?= $form->field($model, 'sale')->radioList([
        '1' => 'Да',
        '0' => 'Нет',
    ]) ?>

    <?= $form->field($model, 'availability')->radioList([
        '0' => 'Да',
        '1' => 'Нет',
    ]) ?>

    <?= $form->field($model, 'recommended')->radioList([
        '1' => 'Да',
        '0' => 'Нет',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
