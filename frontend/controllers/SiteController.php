<?php

namespace frontend\controllers;

use common\models\ListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'mainPage';

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        $news = ListSearch::find()
            ->select(['id', 'date', 'title', 'preview', 'image'])
            ->where(['category_id' => ListSearch::CATEGORY_NEWS, 'enabled' => 1])
            ->orderBy(['date' => SORT_DESC, 'order' => SORT_ASC, 'id' => SORT_DESC])
            ->limit(3)
            ->all();

        $faqs = ListSearch::find()
            ->select(['id', 'date', 'title', 'preview', 'image'])
            ->where(['category_id' => ListSearch::CATEGORY_QUESTION, 'enabled' => 1])
            ->orderBy(['order' => SORT_ASC, 'id' => SORT_DESC])
            ->limit(10)
            ->all();

        return $this->render('index', [
            'news' => $news,
            'faqs' => $faqs
        ]);
    }

    public function actionNews()
    {
        $dataProvider = ListSearch::searchTo(ListSearch::CATEGORY_NEWS);
        $dataProvider->sort->defaultOrder = [
            'date' => SORT_DESC,
            'order' => SORT_ASC,
            'id' => SORT_DESC
        ];
        return $this->render('news', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionQuestions()
    {
        return $this->render('question', [
            'dataProvider' => ListSearch::searchTo(ListSearch::CATEGORY_QUESTION)
        ]);
    }

    public function actionView($id)
    {
        return $this->render('news_view', [
            'model' => $this->findModel($id, ListSearch::CATEGORY_NEWS)
        ]);
    }

    public function actionDetail($id)
    {
        return $this->render('q_view', [
            'model' => $this->findModel($id, ListSearch::CATEGORY_QUESTION)
        ]);
    }

    public function findModel($id, $cid)
    {
        if (($model = ListSearch::findOne(['id'=>$id, 'enabled' => 1, 'category_id' => $cid])) === null)
            throw new NotFoundHttpException('Sahifa topilmadi');
        return $model;
    }

}
