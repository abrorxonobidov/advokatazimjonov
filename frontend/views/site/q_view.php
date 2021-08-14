<?php

use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model common\models\Lists
 */

$this->title = $model->preview;
?>
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3><?= Yii::t('main', 'Savollar') ?></h3>
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

                            <div class="blog-desc-big">
                                <div class="lead"><?= $model->preview ?></div>
                                <p class="small text-right">
                                    <span class="pull-left"><?= $model->title ?></span>
                                    <?= $model->date ? date('Y-m-d', strtotime($model->date)) : '' ?>
                                </p>
                            </div>
                            <div class="blog-desc-big">
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