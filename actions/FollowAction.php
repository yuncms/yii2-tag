<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\actions;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yuncms\tag\models\Tag;

/**
 * Class FollowAction
 * @package yuncms\tag\actions
 */
class FollowAction extends Action
{
    /**
     * 关注某tag
     * @return array
     * @throws NotFoundHttpException
     */
    public function run()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $modelId = Yii::$app->request->post('model_id', null);
        $source = Tag::findOne($modelId);
        if (!$source) {
            throw new NotFoundHttpException ();
        }
        /** @var \yuncms\user\models\User $user */
        $user = Yii::$app->user->identity;
        if ($user->hasTagValues($source->id)) {
            $user->removeTagValues($source->id);
            $user->save();
            return ['status' => 'unfollowed'];
        } else {
            $user->addTagValues($source->id);
            $user->save();
            return ['status' => 'followed'];
        }
    }
}

