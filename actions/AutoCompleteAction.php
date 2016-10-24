<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\actions;

use Yii;
use yii\base\Action;
use yii\web\Response;
use yuncms\tag\models\Tag;

/**
 * Class AutoCompleteAction
 *
 * ```php
 * public function actions()
 * {
 *      return [
 *          'auto-complete' => [
 *              'class' => 'yuncms\tag\actions\AutoCompleteAction',
 *              'clientIdGetParamName'=>'query',
 *              'clientLimitGetParamName'=>'limit',
 *          ]
 *      ];
 * }
 * ```
 *
 * @package Leaps\Tag
 */
class AutoCompleteAction extends Action
{

    public $clientIdGetParamName = 'query';

    public $clientLimitGetParamName = 'limit';

    /**
     * @return array
     */
    public function run()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $query = Tag::find();
        $rows = $query->select(['id', 'name', 'frequency'])
            ->where(['like', 'name', Yii::$app->request->get($this->clientIdGetParamName)])
            ->orderBy(['frequency' => SORT_DESC])
            ->limit(Yii::$app->request->get($this->clientLimitGetParamName,100))
            ->asArray()
            ->all();
        return $rows;
    }
}
