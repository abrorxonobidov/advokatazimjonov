<?php

use yii\helpers\Url;
use yii\widgets\ListView;

/**
 * @var $this yii\web\View
 * @var $news common\models\Lists[]
 */

$this->title = Yii::t('main', 'Yangiliklar');
?>
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Yangiliklar</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed">
            <div class="row">
                <div class="col-md-12">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'options' => [
                            'tag' => false,
                            'class' => '',
                            'id' => '',
                        ],
                        'layout' => "{items}\n<div class='row'><div class=\"col-md-12\">{pager}</div></div>", //\n{summary}
                        'itemView' => function ($model) {
                            return $this->render('_news_item', [
                                'model' => $model
                            ]);
                        },
                        'itemOptions' => [
                            'tag' => false,
                        ],
                        'pager' => [
                            'maxButtonCount' => 10,
                            'options' => [
                                'class' => 'pagination',
//                                'id' => 'pager-container'
                            ],
                        ],
                        'emptyTextOptions' => [
                            'tag' => 'div',
                            'class' => 'alert alert-info'
                        ],
                        'emptyText' =>'Ma’lumotlar to‘ldirilmoqda'
                    ]); ?>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>