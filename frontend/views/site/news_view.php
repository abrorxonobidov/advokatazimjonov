<?php

use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model common\models\Lists
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
                    <div class="content blog-list">
                        <div class="blog-wrapper clearfix">
                            <div class="blog-meta">
                                <h3><?=$model->title?></h3>
                                <ul class="list-inline">
                                    <li><?=date('Y-m-d',strtotime($model->date))?></li>
                                </ul>
                            </div><!-- end blog-meta -->
<?php if ($model->image):?>
                            <div class="blog-media">
                                <img src="/uploads/<?=$model->image?>" alt="" class="img-responsive img-rounded">
                            </div><!-- end media -->
<?php endif;?>
                            <div class="blog-desc-big">
                                <p class="lead"><?=$model->preview?></p>
                                <?=$model->description?>
                                <hr class="invis">

                            </div><!-- end desc -->
                        </div><!-- end blog -->
                    </div><!-- end content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>