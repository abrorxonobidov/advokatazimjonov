<?php
/**
 * @var $model common\models\Lists
 */

use yii\helpers\Url;

$anons = $model->preview;
$body = mb_substr($model->description,0,200,'utf-8');
$img = $model->image;
$date = date('Y-m-d',strtotime($model->date));
?>
<div class="content blog-list">
    <div class="blog-wrapper clearfix">
        <div class="blog-meta">
            <h3><a href="<?=Url::to(['site/detail','id'=>$model->id])?>" title=""><?=$anons?></a></h3>
            <ul class="list-inline">
                <li><?=$date?></li>
            </ul>
        </div><!-- end blog-meta -->

        <div class="row">
            <div class="col-md-12">
                <div class="blog-desc-big">
                    <?=$body?>
                    <a href="<?=Url::to(['site/detail','id'=>$model->id])?>" class="btn btn-primary">Batafsil</a>
                </div><!-- end desc -->
            </div>
        </div>
    </div><!-- end blog -->
</div>

