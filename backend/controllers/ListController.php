<?php

namespace backend\controllers;

use common\helpers\DebugHelper;
use Yii;
use common\models\Lists;
use common\models\ListSearch;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class ListController extends BaseController
{

    public function actionIndex($ci = 1)
    {
        $searchModel = new ListSearch();
        $queryParams = Yii::$app->request->queryParams;
        if ($ci) $queryParams['ListSearch']['category_id'] = $ci;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id, $ci = null)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $ci),
        ]);
    }

    public function actionCreate($ci = null)
    {
        $model = new Lists();
        $model->category_id = $ci;
        if ($model->category_id == 1)
            $model->setScenario('news');
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->uploadImage('previewImageHelper', 'image', 'list');
                return $this->redirect(['view', 'id' => $model->id, 'ci' => $model->category_id]);
            } else {
                DebugHelper::printSingleObject($model->errors, 1);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->category_id == 1)
            $model->setScenario('news');

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->uploadImage('previewImageHelper', 'image', 'list');
                return $this->redirect(['view', 'id' => $model->id, 'ci' => $model->category_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionShare($id)
    {
        $model = $this->findModel($id);

        $response = $model->shareToTelegram();
        $res = Json::decode($response);
        $result = @$res['ok'];

        if ($result) {
            Yii::$app->session->setFlash('success', Yii::t('yii', 'Successfully shared on') . ' Telegram');
        } else {
            Yii::$app->session->setFlash('error', Yii::t('yii', 'Error while sharing on') . "Telegram <br> @$response");
        }
        return $this->redirect(['index', 'ci' => $model->category_id]);
    }

    public function actionDelete($id, $ci = null)
    {
        $this->findModel($id, $ci)->delete();

        return $this->redirect(['index', 'ci' => $ci]);
    }

    protected function findModel($id, $ci = null)
    {
        $model = Lists::find()
            ->where(['id' => $id])
            ->andFilterWhere(['category_id' => $ci])
            ->one();
        if ($model !== null) return $model;
        throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
    }
}
