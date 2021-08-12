<?php
/**
 * @var $model common\models\Lists
 */

use yii\helpers\Url;

$title = $model->title;
$anons = $model->preview;
$img = $model->image;
$date = date('Y-m-d',strtotime($model->date));
?>
<div class="content blog-list">
    <div class="blog-wrapper clearfix">
        <div class="blog-meta">
            <h3><a href="<?=Url::to(['site/view','id'=>$model->id])?>" title=""><?=$title?></a></h3>
            <ul class="list-inline">
                <li><?=$date?></li>
            </ul>
        </div><!-- end blog-meta -->

        <div class="row">
            <?php if($img):?>
            <div class="col-md-3">
                <div class="blog-media">
                    <a href="<?=Url::to(['site/view','id'=>$model->id])?>" title=""><img src="/uploads/<?=$img?>" alt="" class="img-responsive img-rounded"></a>
                </div><!-- end media -->
            </div>
            <?php endif;?>
            <div class="col-md-9">
                <div class="blog-desc-big">
                    <?=$anons?>
                    <a href="<?=Url::to(['site/view','id'=>$model->id])?>" class="btn btn-primary">Batafsil</a>
                </div><!-- end desc -->
            </div>
        </div>
    </div><!-- end blog -->
</div>

