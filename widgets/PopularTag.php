<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\widgets;

use yii\base\Widget;
use yii\base\InvalidConfigException;
use yuncms\tag\models\Tag;


/**
 * 获取热门tag
 *
 * ````
 * <?= \yuncms\tag\widgets\PopularTag::widget(['limit'=>10,'cache'=>3600]); ?>
 * ````
 * @package yuncms\tag
 */
class PopularTag extends Widget
{
    /**
     * @var int 需要显示的数量
     */
    public $limit = 10;

    /**
     * @var int 缓存时间
     */
    public $cache = 1;

    public $class;

    /** @inheritdoc */
    public function init()
    {
        parent::init();
        if (empty ($this->limit)) {
            throw new InvalidConfigException ('The "limit" property must be set.');
        }
    }

    /** @inheritdoc */
    public function run()
    {
        //首页显示排行榜
        $tags = Tag::getDb()->cache(function ($db) {
            return Tag::find()->orderBy(['frequency' => SORT_DESC])->limit($this->limit)->all();
        }, $this->cache);
        return $this->render('popular_tag', [
            'tags' => $tags,
            'class' => $this->class,
        ]);
    }
}