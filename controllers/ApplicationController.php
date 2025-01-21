<?php

namespace app\controllers;

use app\models\Search;
use app\services\ApplicationSearchService;
use Yii;
use yii\web\Controller;

class ApplicationController extends Controller
{
    private $applicationSearchService;

    public function __construct($id, $module, ApplicationSearchService $applicationSearchService, $config = [])
    {
        $this->applicationSearchService = $applicationSearchService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $searchModel = new Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $resolvedAtFrom = $searchModel->resolved_at_from;
        $resolvedAtTo = $searchModel->resolved_at_to;

        $reportData = $this->applicationSearchService->search($resolvedAtFrom, $resolvedAtTo);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'reportData' => $reportData,
        ]);
    }
}
