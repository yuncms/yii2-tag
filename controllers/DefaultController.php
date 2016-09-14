<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\controllers;

use Yii;
use yii\web\Controller;

/**
 * Class DefaultController
 * @package yuncms\tag
 */
class DefaultController extends Controller
{
    /**
     * @return array
     */
    public function actions()
    {
        return [
            'auto-complete' => [
                'class' => 'yuncms\tag\actions\AutoCompleteAction',
                'clientIdGetParamName' => 'query'
            ]
        ];
    }
}