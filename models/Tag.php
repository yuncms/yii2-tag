<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

/**
 * Class Tag
 * @property string $name
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $slug 标识
 * @property string $letter
 * @property int $frequency
 */
class Tag extends ActiveRecord
{
    /** @var string Default name regexp */
    public static $nameRegexp = '/^[\x{4e00}-\x{9fa5}\w\+\.\-#]+$/u';

    // for gbk
    //public static $nameRegexp = '/^[\w._-\x80-\xff\#\+]+$/';

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
            ['name', 'match', 'pattern' => static::$nameRegexp],
            ['name', 'string', 'min' => 2, 'max' => 50],
            ['name', 'unique', 'message' => Yii::t('tag', 'This name has already been taken')],
            [['title', 'slug'], 'string', 'max' => 255],
            ['letter', 'string', 'max' => 1],
            [['keywords', 'description'], 'safe'],
            [['frequency'], 'integer'],
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
            'title' => Yii::t('tag', 'Title'),
            'keywords' => Yii::t('tag', 'Keyword'),
            'description' => Yii::t('tag', 'Description'),
            'frequency' => Yii::t('tag', 'Frequency'),
            'slug' => Yii::t('tag', 'Slug'),
            'letter' => Yii::t('tag', 'Letter'),
        ];
    }

    /** @inheritdoc */
    public function beforeSave($insert)
    {
        if (empty($this->slug)) {
            $this->slug = Inflector::slug($this->name, '');
        }
        if (empty($this->letter)) {
            $this->letter = strtoupper(substr($this->slug, 0, 1));
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
