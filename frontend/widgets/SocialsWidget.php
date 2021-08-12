<?php

namespace frontend\widgets;

use yii\base\Widget;

class SocialsWidget extends Widget
{
    public function run()
    {
        return $this->render('socials');
    }
}