<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yuncms\admin\widgets\Jarvis;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\Tag */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('tag', 'Manage Tag'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="widget-grid">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php Jarvis::begin([
                'noPadding' => true,
                'editbutton' => false,
                'deletebutton' => false,
                'header' => Html::encode($this->title),
                'bodyToolbarActions' => [
                    [
                        'label' => Yii::t('tag', 'Manage Tag'),
                        'url' => ['tag/index'],
                    ],
                    [
                        'label' => Yii::t('tag', 'Create Tag'),
                        'url' => ['tag/create'],
                    ],
                    [
                        'label' => Yii::t('tag', 'Update Tag'),
                        'url' => ['update', 'id' => $model->id],
                        'options' => ['class' => 'btn btn-primary btn-sm']
                    ],
                    [
                        'label' => Yii::t('tag', 'Delete Tag'),
                        'url' => ['delete', 'id' => $model->id],
                        'options' => [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]
                    ],
                ]
            ]); ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'title',
                    'keywords',
                    'description',
                    'pinyin',
                    'letter',
                    'frequency',
                ],
            ]) ?>
            <?php Jarvis::end(); ?>
        </article>
    </div>
</section>
