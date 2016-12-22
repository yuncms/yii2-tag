<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
]); ?>
<fieldset>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'keywords') ?>
    <?= $form->field($model, 'description')->textarea() ?>
    <?= $form->field($model, 'pinyin')->textInput() ?>
    <?= $form->field($model, 'letter')->textInput() ?>
</fieldset>
<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>


