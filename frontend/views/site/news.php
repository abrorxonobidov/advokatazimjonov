<?php

use yii\widgets\ListView;

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::t('main', 'Yangiliklar');
?>
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3><?=$this->title?></h3>
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
                        'itemView' => '_news_item',
                        'itemOptions' => [
                            'tag' => false,
                        ],
                        'pager' => [
                            'maxButtonCount' => 10,
                            'options' => [
                                'class' => 'pagination',
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