<?php

use yii\helpers\Url;
use common\helpers\GeneralHelper;

/**
 * @var $this yii\web\View
 * @var $news common\models\Lists[]
 * @var $faqs common\models\Lists[]
 * @var $faq common\models\Lists
 * @var $item common\models\Lists
 */

$this->title = Yii::t('main', 'Advokat Azimjonov');
?>
<section id="home" class="video-section js-height-full">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>Advokat Azimjonov</p>
            <small>
                Huquqiy axborot - hammaga, har doim, hamma joyda kerak. O‘zingizni qiziqtirgan savollarga javob oling
            </small>
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
            <h3>Top 10 savollar</h3>
        </div><!-- end title -->

        <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
            <?php foreach ($faqs as $faq): ?>
                <div class="caro-item">
                    <div class="course-box">
                        <!--<div class="image-wrap entry question-img-div">
                            <a href="<? /*= Url::to(['site/detail', 'id' => $faq->id]) */ ?>" title="">
                                <img src="/uploads/<? /*= $faq->image ? $faq->image : 'question_img_' . rand(1, 5) . '.jpg' */ ?>" alt="" class="img-responsive">
                            </a>
                        </div>-->
                        <div class="course-details">
                            <h4>
                                <a href="<?= Url::to(['site/detail', 'id' => $faq->id]) ?>" title="">
                                    <?= GeneralHelper::wordCount($faq->preview) ?>
                                </a>
                            </h4>
                            <p><?= $faq->title ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <hr class="invis">

        <div class="section-button text-center">
            <a href="<?= Url::to(['site/questions']) ?>" class="btn btn-primary">Barcha savollarni ko‘rish</a>
        </div>
    </div><!-- end container -->
</section>
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>So‘nggi yangiliklar</h3>
        </div><!-- end title -->

        <div class="row">
            <?php foreach ($news as $item): ?>
                <div class="col-lg-4 col-md-12">
                    <div class="blog-box">
                        <div class="image-wrap entry news-img-div">
                            <a href="<?= Url::to(['site/view', 'id' => $item->id]) ?>" title="">
                                <img src="/uploads/<?= $item->image ? $item->image : 'news_default_image.jpg' ?>" alt="" class="img-responsive">
                            </a>
                        </div><!-- end image-wrap -->

                        <div class="blog-desc text-justify">
                            <h4>
                                <a href="<?= Url::to(['site/view', 'id' => $item->id]) ?>">
                                    <?= $item->title ?>
                                </a>
                            </h4>
                            <p><?= GeneralHelper::wordCount($item->preview) ?></p>
                        </div><!-- end blog-desc -->

                        <div class="post-meta">
                            <ul class="list-inline">
                                <li>
                                    <?= $item->date ? date('d-m-Y', strtotime($item->date)) : '' ?>
                                </li>
                            </ul>
                        </div><!-- end post-meta -->
                    </div><!-- end blog -->
                </div><!-- end col -->
            <?php endforeach; ?>
        </div><!-- end row -->
        <br>
        <br>
        <div class="section-button text-center">
            <a href="<?= Url::to(['site/news']) ?>" class="btn btn-primary">Barcha yangiliklar</a>
        </div>
    </div><!-- end container -->
</section>