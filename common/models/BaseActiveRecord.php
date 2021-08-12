<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 27/07/2021
 * Time: 15:33:00
 */

namespace common\models;

use common\behaviors\CommonTimestampBehavior;
use common\helpers\DebugHelper;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Class BaseActiveRecord
 * @package common\models
 * @property bool $enabled [tinyint(1)]
 * @property int $order [tinyint(1)]
 */
class BaseActiveRecord extends ActiveRecord
{

    public $previewImageHelper;

    public function behaviors()
    {
        return [
            [
                'class' => CommonTimestampBehavior::class
            ]
        ];
    }

    public function getCreator()
    {
        return $this->hasOne(User::class, ['id' => 'creator_id']);
    }

    public function getModifier()
    {
        return $this->hasOne(User::class, ['id' => 'modifier_id']);
    }

    public function getEnable()
    {
        return @self::listsEnabled()[$this->enabled];
    }

    public function getOrder()
    {
        return $this->order ?? 500;
    }

    public static function listsEnabled()
    {
        return [
            1 => Yii::t('main', 'Фаол'),
            0 => Yii::t('main', 'Ўчирилган')
        ];
    }

    public static function uploadImagePath()
    {
        return Yii::$app->params['imageUploadPath'];
    }

    public static function imageSourcePath()
    {
        return 'http://' . Yii::$app->params['domainName'] . '/uploads/';
    }

    public static function getUrlToFrontend($route, $params)
    {
        $url = 'http://' . Yii::$app->params['domainName'] . $route;
        if (!empty($params))
            $url .= '?' . http_build_query($params);
        return $url;
    }

    public function uploadImageMiniPath($file)
    {
        return Yii::$app->params['imageUploadPath'] . 'mini/' . $file;
    }

    public function createGuid()
    {
        $guid = '';
        $uid = uniqid("", true);
        $data = $_SERVER['REQUEST_TIME'];
        $data .= $_SERVER['HTTP_USER_AGENT'];
        $hash = hash('ripemd128', $uid . $guid . md5($data));
        $guid = substr($hash, 0, 8) .
            '-' . substr($hash, 8, 4) .
            '-' . substr($hash, 12, 4) .
            '-' . substr($hash, 16, 4) .
            '-' . substr($hash, 20, 12);
        return $guid;
    }

    public function uploadImage($fileInput, $field, $table = '')
    {
        $image = UploadedFile::getInstance($this, $fileInput);
        if ($image) {
            if (!$this->isNewRecord) {
                if (!empty($this->$field)) {
                    $oldImage = $this->uploadImagePath() . $this->$field;
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
            }

            $imageName = $table . '_' . $this->id . '_' . $this->createGuid() . '.' . $image->getExtension();
            $this->$field = $imageName;
            $this->updateAttributes([$field]);
            $imagePath = $this->uploadImagePath() . $imageName;

            if (!$image->saveAs($imagePath))
                DebugHelper::printSingleObject($image->error, 1);
        }
    }

    public function inputImageConfig($field, $deleteUrl)
    {
        $config = ['path' => [], 'config' => []];
        if (!$this->isNewRecord && !empty($this->$field)) {
            $image = $this->$field;
            $file = $this->uploadImagePath() . $image;
            if (file_exists($file)) {
                $config['path'] = ['http://' . Yii::$app->params['domainName'] . '/uploads/' . $this->$field];
                $config['config'] = [
                    [
                        'caption' => $image,
                        'size' => filesize($file),
                        'url' => Url::to([$deleteUrl]),
                        'key' => $this->$field,
                        'extra' => [
                            'id' => $this->id,
                            'field' => $field,
                            'className' => get_called_class()
                        ],
                    ]
                ];
            }
        }
        return $config;
    }

    public static function getList($titleField = null)
    {
        if ($titleField === null)
            $titleField = 'title_' . Yii::$app->language;
        $list = self::find()
            ->select([
                'id',
                'title' => $titleField
            ])
            ->where(['enabled' => 1])
            ->asArray()
            ->all();
        $out = [];
        foreach ($list as $item)
            $out[$item['id']] = $item['title'];
        return $out;
    }

    public static function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            throw new NotFoundHttpException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public static function ckEditorConfig($key)
    {
        return [
            'options' => [
                'id' => 'CK-' . $key
            ],
            'preset' => 'custom',
            'clientOptions' => [
                'allowedContent' => true,
                'height' => 400,
                'language' => 'en',
                'extraPlugins' => 'font,smiley,colorbutton,iframe,selectall,copyformatting,justify',
                'removeButtons' => 'About,Anchor,Styles,Font',
                "toolbarGroups" => [
                    ['name' => 'document', 'groups' => ['mode']],
                    ['name' => 'clipboard', 'groups' => ['undo', 'clipboard']],
                    ['name' => 'editing', 'groups' => ['find', 'selection', 'editing']],
                    ['name' => 'links', 'groups' => ['links']],
                    ['name' => 'insert', 'groups' => ['insert']],
                    ['name' => 'colors', 'groups' => ['colors']],
                    '/',
                    ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                    ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'paragraph']],
                    ['name' => 'styles', 'groups' => ['styles']]
                ],
                'toolbar' => [
                    ['name' => 'document', 'items' => ['Source']],
                    ['name' => 'clipboard', 'items' => ['Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord']],
                    ['name' => 'editing', 'items' => ['SelectAll']],
                    ['name' => 'links', 'items' => ['Link', 'Unlink']],
                    ['name' => 'insert', 'items' => ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'Iframe']],
                    ['name' => 'colors', 'items' => ['TextColor', 'BGColor']],
                    ['name' => 'tools', 'items' => ['Maximize']],
                    '/',
                    ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat']],
                    ['name' => 'paragraph', 'items' => ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']],
                    ['name' => 'styles', 'items' => ['Format', 'FontSize']]
                ],
            ],
        ];
    }

}