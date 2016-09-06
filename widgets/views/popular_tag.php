<?php

use yii\helpers\Html;

/**
 * @var \yuncms\tag\models\Tag $tags
 * @var string $css
 */
?>
<?= Html::beginTag('ul', ['class' => $class]); ?>
    <?php
    foreach ($tags as $tag) {
        echo Html::tag('li', Html::a($tag->name, ['/tag/tag/view', 'tag' => $tag->name], ['rel' => 'tag']));
    }
    ?>
<?= Html::endTag('ul'); ?>