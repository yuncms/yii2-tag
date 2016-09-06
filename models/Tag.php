<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\models;

use Yii;
use yii\db\ActiveRecord;
use Overtrue\Pinyin\Pinyin;

/**
 * Class Tag
 * @property string $name
 * @property string $description
 * @property string $pinyin
 * @property string $letter
 * @property int $frequency
 */
class Tag extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 255],
            ['frequency', 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('tag', 'Tag'),
            'description' => Yii::t('app', 'Description'),
            'frequency' => Yii::t('tag', 'Frequency'),
            'pinyin' => Yii::t('tag', 'Pinyin'),
            'letter' => Yii::t('tag', 'Letter'),
        ];
    }

    /** @inheritdoc */
    public function beforeSave($insert)
    {
        if (empty($this->pinyin)) {
            $py = new Pinyin();
            $this->pinyin = strtolower($py->permalink($this->name, ''));
        }
        if (empty($this->letter)) {
            $this->letter = strtoupper(substr($this->pinyin, 0, 1));
        }
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }
}
