<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lists".
 *
 * @property int $id
 * @property int $category_id
 * @property string $preview
 * @property string $description
 * @property string $image [varchar(255)]
 * @property string $date [datetime]
 * @property int $created_at [timestamp]
 * @property int $updated_at [timestamp]
 * @property int $creator_id [int(11)]
 * @property int $modifier_id [int(11)]
 * @property string $title [varchar(255)]
 * @property int $order [int(11)]
 * @property bool $enabled [tinyint(1)]
 */
class Lists extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title'], 'required'],
            [['category_id', 'order', 'enabled', 'creator_id', 'modifier_id'], 'integer'],
            [['preview', 'description'], 'string'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'category_id' => Yii::t('main', 'Kategoriya'),
            'title' => Yii::t('main', 'Sarlavha'),
            'preview' => Yii::t('main', 'Savol'),
            'description' => Yii::t('main', 'Javob'),
            'image' => Yii::t('main', 'Rasm'),
            'order' => Yii::t('main', 'Tartib'),
            'date' => Yii::t('main', 'Sana'),
            'enabled' => Yii::t('main', 'Aktiv'),
            'created_at' => Yii::t('main', 'Yaratilgan sana'),
            'updated_at' => Yii::t('main', 'Tahrirlangan sana'),
            'creator_id' => Yii::t('main', 'Yaratuvchi'),
            'modifier_id' => Yii::t('main', 'Tahrirlovchi'),
        ];
    }



    public static function find()
    {
        return new ListsQuery(get_called_class());
    }
}
