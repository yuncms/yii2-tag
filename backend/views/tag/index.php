<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yuncms\admin\widgets\Jarvis;

/* @var $this yii\web\View */
/* @var $searchModel yuncms\tag\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tag/tag', 'Manage Tag');
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="widget-grid">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php $w = Jarvis::begin([
                'noPadding' => true,
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
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'pinyin',
                    'letter',
                    'frequency',
                    ['class' => 'yii\grid\ActionColumn', 'header' => Yii::t('app', 'Operation'),],
                ],
            ]); ?>
            <?php Jarvis::end(); ?>
        </article>
    </div>
</section>