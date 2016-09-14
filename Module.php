<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag;

use Yii;
use yuncms\tag\models\Tag;


/**
 * This is the main module class for the Tag module.
 *
 * To use Tag, include it as a module in the application configuration like the following:
 *
 * ~~~
 * return [
 *     ......
 *     'modules' => [
 *         'tag' => ['class' => 'yuncms\tag\Module'],
 *     ],
 * ]
 * ~~~
 *
 * With the above configuration, you will be able to access Tag Module in your browser using
 * the URL `http://localhost/path/to/index.php?r=tag`
 *
 * You can then access Tag via URL: `http://localhost/path/to/index.php/tag`
 */
class Module extends \yii\base\Module
{

    public $controllerNamespace = 'yuncms\tag\controllers';

    public $defaultRoute = 'tag';

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /* @var $action \yii\base\Action */
            $view = $action->controller->getView();

            $view->params['breadcrumbs'][] = [
                'label' => Yii::t('tag', 'Tags'),
                'url' => ['/' . $this->uniqueId]
            ];
            return true;
        }
        return false;
    }

    /**
     * 获取热门标签
     * @param int $limit 返回数量
     * @return array|Tag[]
     */
    public static function getFrequency($limit = 10)
    {
        $query = Tag::find()->orderBy(['frequency'=>SORT_DESC])->limit($limit);
        return $query->all();
    }
}
