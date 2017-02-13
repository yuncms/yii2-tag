<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yuncms\admin\widgets\Jarvis;

/* @var $this yii\web\View */
/* @var $searchModel yuncms\tag\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tag', 'Manage Tag');
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
                        'label' => Yii::t('tag', 'Manage Tag'),
                        'url' => ['index'],
                    ],
                    [
                        'label' => Yii::t('tag', 'Create Tag'),
                        'url' => ['create'],
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