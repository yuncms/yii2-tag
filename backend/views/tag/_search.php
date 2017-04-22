<?php

use yii\helpers\Html;
use xutl\inspinia\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\TagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-search pull-right">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('id'),
        ],
    ]) ?>

    <?= $form->field($model, 'name', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('name'),
        ],
    ]) ?>

<!--    --><?//= $form->field($model, 'description', [
//        'inputOptions' => [
//            'placeholder' => $model->getAttributeLabel('route'),
//        ],
//    ]) ?>

<!--    --><?//= $form->field($model, 'pinyin', [
//        'inputOptions' => [
//            'placeholder' => $model->getAttributeLabel('route'),
//        ],
//    ]) ?>

    <?= $form->field($model, 'letter', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('letter'),
        ],
    ]) ?>

    <?php // echo $form->field($model, 'frequency') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
