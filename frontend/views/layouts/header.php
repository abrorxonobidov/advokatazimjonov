<header class="header">
    <div class="topbar clearfix">
        <div class="container">
            <div class="row-fluid">
                <div class="col-md-6 col-sm-6 text-left">
                    <p>
                        <strong><i class="fa fa-phone"></i></strong>
                        <a href="tel:+998991234567"> +998 99 123 45 67</a> &nbsp;&nbsp;
                        <strong><i class="fa fa-telegram"></i></strong> <a href="https://t.me/advokatAzimjonovBot" target="_blank">Telegram bot</a>
                    </p>
                </div><!-- end left -->
                <div class="col-md-6 col-sm-6 hidden-xs text-right">
                    <?= frontend\widgets\SocialsWidget::widget() ?>
                </div><!-- end left -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end topbar -->

    <div class="container">
        <nav class="navbar navbar-default yamm">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<div class="logo-normal">
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
                </div>-->
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= yii\helpers\Url::to(['/']) ?>">Bosh sahifa</a></li>
                    <li class="<?=Yii::$app->controller->route == 'site/questions' ? 'active' : '' ?>"><a href="<?= yii\helpers\Url::to(['site/questions']) ?>">Savol-javoblar</a></li>
                    <li class="<?=Yii::$app->controller->route == 'site/news' ? 'active' : '' ?>"><a href="<?= yii\helpers\Url::to(['site/news']) ?>">Yangiliklar</a></li>
                </ul>
            </div>
        </nav><!-- end navbar -->
    </div><!-- end container -->
</header>