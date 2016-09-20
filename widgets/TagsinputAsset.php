<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\widgets;

use yii\web\AssetBundle;

/**
 * Class TagsinputAsset
 * @package yuncms\tag
 */
class TagsinputAsset extends AssetBundle
{
    public $basePath = '@vendor/yuncms/yii2-tag/assets';

    public $css = [
        'bootstrap-tagsinput.css',
    ];
    public $js = [
        'bootstrap-tagsinput.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}