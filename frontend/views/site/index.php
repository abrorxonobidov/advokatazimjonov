<?php

use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $news common\models\Lists[]
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
            <h3>Recent Courses</h3>
            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien
                iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
        </div><!-- end title -->

        <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="/uploads/course_01.jpg" alt="" class="img-responsive">

                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">Modern JavaScript Linting With ESLint</a>
                        </h4>
                        <p>Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.</p>
                    </div><!-- end details -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="/uploads/course_02.jpg" alt="" class="img-responsive">

                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">Designing Game UI Assets in Adobe Illustrator</a>
                        </h4>
                        <p>Curabitur condimentum velit non odio mattis tristique. Nam vitae orci aliquam. </p>
                    </div><!-- end details -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="/uploads/course_03.jpg" alt="" class="img-responsive">

                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">How to Become a Web Developer: Learn PHP</a>
                        </h4>
                        <p>Donec auctor nec nibh sit amet pulvinar. Mauris nulla elit, lacinia ac facilisis mattis.</p>
                    </div><!-- end details -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="/uploads/course_04.jpg" alt="" class="img-responsive">

                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">How to Build a Custom Theme for Drupal 8</a>
                        </h4>
                        <p>Pellentesque ut enim dictum, interdum lorem eget, vulputate eros sed felis euismod.</p>
                    </div><!-- end details -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="/uploads/course_01.jpg" alt="" class="img-responsive">

                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">Modern JavaScript Linting With ESLint</a>
                        </h4>
                        <p>Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.</p>
                    </div><!-- end details -->
                </div><!-- end box -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis">

        <div class="section-button text-center">
            <a href="<?= Url::to(['site/questions']) ?>" class="btn btn-primary">View All Courses</a>
        </div>
    </div><!-- end container -->
</section>
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Recent News</h3>
            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien
                iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="blog-box">
                    <div class="image-wrap entry">
                        <a href="blog-single.html" title="">
                            <img src="/uploads/blog_01.jpeg" alt="" class="img-responsive">
                        </a>
                    </div><!-- end image-wrap -->

                    <div class="blog-desc">
                        <h4><a href="blog-single.html">How to learn perfect code with Javascript</a></h4>
                        <p>Praesent at suscipit ligula. Suspendisse pre neque, quis suscipit enim. sed maximus, mia
                            auctor.</p>
                    </div><!-- end blog-desc -->

                    <div class="post-meta">
                        <ul class="list-inline">
                            <li><a href="#">21 March 2017</a></li>
                            <li><a href="#">by WP Destek</a></li>
                            <li><a href="#">14 Share</a></li>
                        </ul>
                    </div><!-- end post-meta -->
                </div><!-- end blog -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12">
                <div class="blog-box">
                    <div class="image-wrap entry">
                        <a href="blog-single.html" title="">
                            <img src="/uploads/blog_02.jpeg" alt="" class="img-responsive">
                        </a>
                    </div><!-- end image-wrap -->

                    <div class="blog-desc">
                        <h4><a href="blog-single.html">The most suitable web design & development tutorials</a></h4>
                        <p>Sed suscipit neque in erat posuere tristique aliquam porta vestibulum. Cras placerat
                            tincidunt. </p>
                    </div><!-- end blog-desc -->

                    <div class="post-meta">
                        <ul class="list-inline">
                            <li><a href="#">20 March 2017</a></li>
                            <li><a href="#">by WP Destek</a></li>
                            <li><a href="#">11 Share</a></li>
                        </ul>
                    </div><!-- end post-meta -->
                </div><!-- end blog -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12">
                <div class="blog-box">
                    <div class="image-wrap entry">
                        <a href="blog-single.html" title="">
                            <img src="/uploads/blog_03.jpeg" alt="" class="img-responsive">
                        </a>
                    </div><!-- end image-wrap -->

                    <div class="blog-desc">
                        <h4><a href="blog-single.html">Design for all mobile devices! This is name "responsive"</a></h4>
                        <p>Suspendisse scelerisque ex ac mattis molestie vel enim ut massa placerat faucibus sed ut dui
                            vivamus. </p>
                    </div><!-- end blog-desc -->

                    <div class="post-meta">
                        <ul class="list-inline">
                            <li><a href="#">19 March 2017</a></li>
                            <li><a href="#">by WP Destek</a></li>
                            <li><a href="#">44 Share</a></li>
                        </ul>
                    </div><!-- end post-meta -->
                </div><!-- end blog -->
            </div><!-- end col -->
        </div><!-- end row -->
        <br>
        <br>
        <div class="section-button text-center">
            <a href="<?= Url::to(['site/news'])?>" class="btn btn-primary">All news</a>
        </div>
    </div><!-- end container -->
</section>