<?php
/**
 * @var $model common\models\Lists
 */

use yii\helpers\Url;

$body = mb_substr(strip_tags($model->description, '<br><p>'), 0, 200, 'utf-8');
$date = date('Y-m-d', strtotime($model->date));
?>
<div class="content blog-list">
    <div class="blog-wrapper clearfix">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-desc-big">
                    <div class="lead"><?= strip_tags($model->preview, '<br><p>') ?></div>
                    <p class="small text-right">
                        <span class="pull-left"><?= $model->title ?></span>
                        <?= $date ?>
                    </p>
                    <div><?= $body ?></div>
                    <a href="<?= Url::to(['site/detail', 'id' => $model->id]) ?>" class="btn btn-primary">Batafsil</a>
                </div>
            </div>
        </div>
    </div>
</div>

