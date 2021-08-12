<?php

use yii\helpers\Html;
use common\models\Lists;

/**
 * @var $this yii\web\View
 * @var $searchModel common\models\ListSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::$app->request->get('ci') ? $searchModel->categoryTitle : Yii::t('main', 'Рўйхат');
$this->params['breadcrumbs'][] = $this->title;

echo common\helpers\GeneralHelper::titleAndCreateBtn($this->title);

echo yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'attribute' => 'category_id',
            'value' => 'categoryTitle',
            'filter' => common\models\Lists::categoryList(),
            'visible' => !Yii::$app->request->get('ci')
        ],
        [
            'attribute' => 'title',
            'label' => $searchModel->getLabel('title'),
            'format' => 'raw'
        ],
        [
            'attribute' => 'preview',
            'label' => $searchModel->getLabel('preview'),
            'format' => 'raw'
        ],
        [
            'attribute' => 'date',
            'format' => ['date', 'php:Y-m-d'],
            'filter' => kartik\date\DatePicker::widget([
                'type' => 3,
                'attribute' => 'date',
                'model' => $searchModel,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ])
        ],
        [
            'attribute' => 'image',
            'value' => function (Lists $model) {
                return $model->image ?
                    Html::img($model::imageSourcePath() . $model->image, ['class' => 'img-responsive img-thumbnail']) .
                    Html::tag('p', $model->image, ['style' => 'font-size:10px;'])
                    : '';
            },
            'format' => 'raw',
            'headerOptions' => [
                'class' => 'col-md-2'
            ],
        ],
        'order',
        [
            'attribute' => 'enabled',
            'filter' => $searchModel::listsEnabled(),
            'value' => 'enable'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function ($action, Lists $model) {
                return [$action, 'id' => $model->id, 'ci' => Yii::$app->request->get('ci')];
            }
        ],
    ],
]);
