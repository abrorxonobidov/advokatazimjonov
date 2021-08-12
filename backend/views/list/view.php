<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\widgets\DetailView;

/**
 * @var $this yii\web\View
 * @var $model common\models\Lists
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::$app->request->get('ci') ? $model->categoryTitle : Yii::t('main', 'Рўйхат'),
    'url' => ['index', 'ci' => Yii::$app->request->get('ci')]
];
$this->params['breadcrumbs'][] = $this->title;

echo common\helpers\GeneralHelper::actionButtons($model);

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'categoryTitle',
        [
            'attribute' => 'title',
            'label' => $model->getLabel('title'),
            'format' => 'raw'
        ],
        [
            'attribute' => 'preview',
            'label' => $model->getLabel('preview'),
            'format' => 'raw'
        ],
        [
            'attribute' => 'description',
            'label' => $model->getLabel('description'),
            'format' => 'raw'
        ],
        'description:raw',
        'date:date',
        [
            'attribute' => 'image',
            'value' => Html::img($model::imageSourcePath() . $model->image, ['class' => 'col-md-4'])
                . ' ' . Html::tag('p', $model->image),
            'format' => 'raw'
        ],
        'order',
        'enable',
        'created_at',
        'updated_at',
        'creator.full_name',
        'modifier.full_name',
    ],
]);
