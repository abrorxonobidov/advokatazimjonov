<?php

use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $news common\models\Lists[]
 * @var $faqs common\models\Lists[]
 * @var $faq common\models\Lists
 * @var $item common\models\Lists
 */

$this->title = Yii::t('main', 'Advokat');
?>
<section id="home" class="video-section js-height-full">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>Learning Management System</p>
            <small>Edulogy is the ideal choice for your organization, your business and your online education system.
                Create your online course now with unlimited page templates, color options, and menu features.</small>
            <div class="btn-wrapper">
                <div class="text-center">
                    <a href="https://t.me/advokatAzimjonovBot" class="btn btn-primary wow slideInLeft" target="_blank">Savol
                        yuborish</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="<?= Url::to(['site/questions']) ?>" class="btn btn-default wow slideInRight">Savol-javoblar</a>
                </div>
            </div><!-- end row -->
        </div>
    </div>
</section>
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>So`ngi savollar</h3>
        </div><!-- end title -->

        <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
            <?php foreach ($faqs as $faq):?>
            <div class="caro-item">
                <div class="course-box">
                    <div class="course-details">
                        <h4>
                            <a href="<?=Url::to(['site/detail','id'=>$faq->id])?>" title=""><?=mb_substr($faq->preview,0,80,'utf-8')?></a>
                        </h4>
                        <p><?php echo mb_substr($faq->description,0,100,'utf-8')?></p>
                    </div><!-- end details -->
                </div><!-- end box -->
            </div><!-- end col -->
            <?php endforeach;?>
        </div><!-- end row -->

        <hr class="invis">

        <div class="section-button text-center">
            <a href="<?=Url::to(['site/questions'])?>" class="btn btn-primary">Barcha savollarni ko`rish</a>
        </div>
    </div><!-- end container -->
</section>
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>So`ngi yangiliklar</h3>
        </div><!-- end title -->

        <div class="row">
            <?php foreach ($news as $item):?>
            <div class="col-lg-4 col-md-12">
                <div class="blog-box">
                    <div class="image-wrap entry">
                            <a href="<?=Url::to(['site/view','id'=>$item->id])?>" title="">
                                <img src="/uploads/<?=$item->image?>" alt="" class="img-responsive">
                            </a>
                    </div><!-- end image-wrap -->

                    <div class="blog-desc">
                        <h4><a href="<?=Url::to(['site/view','id'=>$item->id])?>"><?=$item->title?></a></h4>
                        <p><?=$item->preview?></p>
                    </div><!-- end blog-desc -->

                    <div class="post-meta">
                        <ul class="list-inline">
                            <li><a href="#"><?=date('d-m-Y',strtotime($item->date))?></a></li>
                        </ul>
                    </div><!-- end post-meta -->
                </div><!-- end blog -->
            </div><!-- end col -->
            <?php endforeach;?>
        </div><!-- end row -->
        <br>
        <br>
        <div class="section-button text-center">
            <a href="<?=Url::to(['site/news'])?>" class="btn btn-primary">Barcha yangiliklar</a>
        </div>
    </div><!-- end container -->
</section>