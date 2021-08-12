<?php

use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model common\models\Lists
 */

$this->title = Yii::t('main', 'Savollar');
$arr = explode(',',$model->title);
?>
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Savollar</h3>
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
                                <ul class="list-inline">
                                    <li><?=date('Y-m-d',strtotime($model->date))?></li>
                                    <li><a href="#">
                                            <?php
                                            foreach ($arr as $item):
                                            echo '#'.$item.'<span> </span>';
                                            endforeach;
                                            ?>
                                        </a></li>
                                </ul>
                            </div><!-- end blog-meta -->

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