<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yuncms\tag\models\Tag;

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

    /**
     * 标签首页
     * @return string
     */
    public function actionIndex()
    {
        Url::remember('', 'actions-redirect');
        $dataProvider = new ActiveDataProvider([
            'query' => Tag::find(),
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param string $name
     * @return null|static
     * @throws NotFoundHttpException
     */
    public function findModel($name)
    {
        if (($model = Tag::findOne(['name' => $name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}