<?php

namespace frontend\controllers;

use common\models\Lists;
use common\models\ListSearch;
use Yii;
use yii\web\Controller;

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
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
//        $lang = Yii::$app->language;
//        $news = ListSearch::find()
//            ->select([
//                'id',
//                'date',
//                "title_$lang",
//                "preview_$lang",
//                'preview_image',
//            ])
//            ->where([
//                'category_id' => 3,
//                'enabled' => 1,
//            ])
//            ->orderBy([
//                'date' => SORT_DESC,
//                'order' => SORT_ASC
//            ])
//            ->limit(6)
//            ->all();

        return $this->render('index', [
//            'news' => $news
        ]);
    }

    public function actionNews()
    {
        $searchModel = new ListSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['ListSearch']['category_id'] = 1;
        $dataProvider = $searchModel->searchTo($queryParams);
        return $this->render('news', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionQuestions()
    {
        $searchModel = new ListSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['ListSearch']['category_id'] = 2;
        $dataProvider = $searchModel->searchTo($queryParams);

        return $this->render('question', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $page = Lists::findOne($id);
        return $this->render('news_view', [
            'model' => $page
        ]);
    }

    public function actionDetail($id)
    {
        $page = Lists::findOne($id);
        return $this->render('q_view', [
            'model' => $page
        ]);
    }

}
