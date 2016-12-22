<?php

use yii\helpers\Html;
use yuncms\admin\widgets\Jarvis;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\Tag */

$this->title = Yii::t('tag/tag', 'Update Tag') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('tag/tag', 'Manage Tag'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<section id="widget-grid">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php $w = Jarvis::begin([
                'editbutton' => false,
                'deletebutton' => false,
                'header' => Html::encode($this->title),
                'bodyToolbarActions' => [
                    [
                        'label' => Yii::t('tag/tag', 'Manage Tag'),
                        'url' => ['tag/index'],
                    ],
                    [
                        'label' => Yii::t('tag/tag', 'Create Tag'),
                        'url' => ['tag/create'],
                    ],
                ]
            ]); ?>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
            <?php Jarvis::end(); ?>
        </article>
    </div>
</section>