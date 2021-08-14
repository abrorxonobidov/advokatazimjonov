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
                    <h3><?= $this->title ?></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed">
            <div class="row">
                <div class="col-md-12">
                    <div class="content blog-list">
                        <div class="blog-wrapper clearfix">
                            <div class="blog-meta">
                                <h3><?= $model->title ?></h3>
                                <ul class="list-inline">
                                    <li><?= date('Y-m-d', strtotime($model->date)) ?></li>
                                </ul>
                            </div>
                            <? if ($model->image) { ?>
                                <div class="blog-media">
                                    <img src="/uploads/<?= $model->image ?>" alt="" class="img-responsive img-rounded">
                                </div>
                            <? } ?>
                            <div class="blog-desc-big">
                                <div class="lead">
                                    <?= $model->preview ?>
                                </div>
                                <?= $model->description ?>
                                <hr class="invis">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>