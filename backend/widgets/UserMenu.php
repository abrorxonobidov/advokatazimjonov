<?php
/**
 * Created by PhpStorm.
 * User: a_isokov
 * Date: 26.12.2015
 * Time: 16:30
 */

namespace backend\widgets;

use Yii;
use yii\bootstrap\Widget;
use yii\web\User;

/**
 */
class UserMenu extends Widget
{
    /** @var User $user */
    public $user;

    /**
     * @return string
     */
    public function run()
    {
        $items = [
            ['label' => '&nbsp;', 'options' => ['class' => 'header'], 'encode' => false],
            [
                'label' => Yii::t('main', 'Сайтга ўтиш'),
                'url' => 'http://' . Yii::$app->params['domainName'],
                'icon' => 'globe'
            ]
        ];

        if ($this->user->isGuest) {
            $items[] = ['label' => Yii::t('main', 'Вход'), 'url' => ['/site/login']];
        } else {
            $items[] = ['label' => 'Янгиликлар', 'icon' => 'newspaper-o', 'url' => ['/list/index', 'ci' => 1]];
            $items[] = ['label' => 'Савол-жавоблар', 'icon' => 'comments-o', 'url' => ['/list/index', 'ci' => 2]];
        }
        return $this->render('userMenu',
            [
                'items' => $items
            ]);
    }
}
