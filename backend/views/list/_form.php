<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/**
 * @var $this yii\web\View
 * @var $model common\models\Lists
 * @var $form yii\widgets\ActiveForm
 */

$form = ActiveForm::begin();

echo common\helpers\GeneralHelper::oneRow([
    $form->field($model, 'category_id')->hiddenInput()->label(false),
    $form->field($model, 'date')->widget(kartik\date\DatePicker::class, [
        'type' => 3,
        'attribute' => 'date',
        'model' => $model,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true
        ]
    ]),
    $form->field($model, 'order')->textInput(['value' => $model->getOrder()]),
    $form->field($model, 'enabled')->dropDownList($model::listsEnabled())
]);


echo $form->field($model, 'title')->textInput()->label($model->getLabel('title'));

$previewConfig = $model->inputImageConfig('image', 'list/file-remove');

echo $form->field($model, 'previewImageHelper')
    ->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'previewFileType' => 'image',
            'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
            'initialPreview' => $previewConfig['path'],
            'initialPreviewAsData' => true,
            'initialPreviewConfig' => $previewConfig['config'],
            'showUpload' => false,
            'showRemove' => false,
            'browseClass' => 'btn btn-success',
            'browseLabel' => Html::icon('folder-open') . ' Tanglang',
            'browseIcon' => '',
            'fileActionSettings' => [
                'removeIcon' => Html::icon('trash'),
                'showZoom' => false,
            ]
        ]
    ]);


echo $form->field($model, "preview")
    ->widget(dosamigos\ckeditor\CKEditor::class, $model->ckEditorConfig('preview'))->label($model->getLabel('preview'));

echo $form->field($model, "description")
    ->widget(dosamigos\ckeditor\CKEditor::class, $model->ckEditorConfig('description'))->label($model->getLabel('description'));


echo Html::tag('div', Html::submitButton(Yii::t('main', 'Сақлаш'), ['class' => 'btn btn-success']), ['class' => 'form-group']);

ActiveForm::end();
