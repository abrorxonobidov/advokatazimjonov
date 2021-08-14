<?php

namespace common\models;

use Yii;
use yii\bootstrap\Html;
use yii\httpclient\Client;

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
 * @property string $categoryTitle
 */
class Lists extends BaseActiveRecord
{

    const CATEGORY_NEWS = 1;
    const CATEGORY_QUESTION = 2;

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
            [['category_id'], 'required'],
            [['title', 'date'], 'required', 'on' => 'news'],
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
            'categoryTitle' => Yii::t('main', 'Kategoriya'),
            'title' => Yii::t('main', 'Sarlavha'),
            'preview' => Yii::t('main', 'Savol'),
            'description' => Yii::t('main', 'Javob'),
            'image' => Yii::t('main', 'Rasm'),
            'previewImageHelper' => Yii::t('main', 'Rasm'),
            'order' => Yii::t('main', 'Tartib'),
            'date' => Yii::t('main', 'Sana'),
            'enabled' => Yii::t('main', 'Aktiv'),
            'enable' => Yii::t('main', 'Aktiv'),
            'created_at' => Yii::t('main', 'Yaratilgan sana'),
            'updated_at' => Yii::t('main', 'Tahrirlangan sana'),
            'creator_id' => Yii::t('main', 'Yaratuvchi'),
            'modifier_id' => Yii::t('main', 'Tahrirlovchi'),
        ];
    }

    public static function labelList()
    {
        return [
            'title' => [
                self::CATEGORY_NEWS => 'Sarlavha',
                self::CATEGORY_QUESTION => 'Hash Tag (#)',
            ],
            'preview' => [
                self::CATEGORY_NEWS => 'Anons',
                self::CATEGORY_QUESTION => 'Savol',
            ],
            'description' => [
                self::CATEGORY_NEWS => 'Batafsil',
                self::CATEGORY_QUESTION => 'Javob',
            ],
        ];
    }

    public function getLabel($attribute)
    {
        return self::labelList()[$attribute][$this->category_id];
    }

    public static function categoryList()
    {
        return [
            1 => 'Янгиликлар',
            2 => 'Савол-жавоблар'
        ];
    }

    public function getCategoryTitle()
    {
        return @self::categoryList()[$this->category_id];
    }


    public static function find()
    {
        return new ListsQuery(get_called_class());
    }

    public function shareToTelegram()
    {
        $bot_token = Yii::$app->params['tg_token'];
        $chat_id = Yii::$app->params['tg_chat_id'];

        $links = 'Ijtimoiy tarmoqlar' . "</b> \u{1f447} \n \n"
            . Html::a('Instagram', Yii::$app->params['instagram']) . ' | '
            . Html::a('Facebook', Yii::$app->params['facebook']) . ' | '
            . Html::a('Youtube', Yii::$app->params['youtube']) . ' | '
            . Html::a('Telegram', Yii::$app->params['telegram']) . " \n \n ";

        if ($this->category_id == self::CATEGORY_NEWS) {
            $caption = "#yangilik \n<b> $this->title </b>"
                . "\n \n \u{1f449} http://advokatazimjonov.uz/n/$this->id <b>\n \n ";
            $http_query = http_build_query([
                'chat_id' => $chat_id,
                'caption' => $caption . $links,
                'photo' => $this->image ? self::imageSourcePath() . $this->image : self::imageSourcePath() . 'news_default_image.jpg',
                'parse_mode' => 'html'
            ]);
            $url = "https://api.telegram.org/bot$bot_token/sendPhoto?$http_query";
        } else {
            $caption = "#savol $this->title \n <b>" . strip_tags($this->preview) . '</b>'
                . "\n Javobni bu yerda o‘qing: \n \u{1f449} http://advokatazimjonov.uz/s/$this->id <b>\n \n";

            if ($this->image) {
                $http_query = http_build_query([
                    'chat_id' => $chat_id,
                    'caption' => $caption . $links,
                    //'photo' => "http://idesignedit.uz/uploads/678ca3b0-9faa-08ec-3df4-be4ac3caa926.jpg",
                    'photo' => self::imageSourcePath() . $this->image,
                    'parse_mode' => 'html'
                ]);
                $url = "https://api.telegram.org/bot$bot_token/sendPhoto?$http_query";
            } else {
                $http_query = http_build_query([
                    'chat_id' => $chat_id,
                    'text' => "$caption $links $this->title",
                    'parse_mode' => 'html'
                ]);
                $url = "https://api.telegram.org/bot$bot_token/sendMessage?$http_query";
            }

        }

        $client = new Client(['transport' => 'yii\httpclient\CurlTransport']);
        try {
            $resp = $client->createRequest()
                ->setUrl($url)
                ->setOptions([
                    'timeout' => 15,
                    CURLOPT_SSL_VERIFYPEER => false
                ])
                ->send();
        } catch (\Exception $e) {
            return null;
        }

        return $resp->content;
    }

}
