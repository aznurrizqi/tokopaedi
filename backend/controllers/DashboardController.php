<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use common\models\Purchase;
use common\models\Sale;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;

/**
 * DashboardController used for reporting.
 */
class DashboardController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all dashboard-related models.
     * @return mixed
     */
    public function actionIndex()
    {
        $modelProduct = new Product();
        $monthlyReport = $modelProduct->getMonthlyReport();
        $ytdReport = $modelProduct->getYtdReport();
        $yoyReport = $modelProduct->getYoyReport();

        $monthlyReportDataProvider = new ArrayDataProvider([
            'models' => $monthlyReport,
            'sort' => false,
        ]);

        $ytdReportDataProvider = new ArrayDataProvider([
            'models' => $ytdReport,
            'sort' => false,
        ]);

        $yoyReportDataProvider = new ArrayDataProvider([
            'models' => $yoyReport,
            'sort' => false,
        ]);

        return $this->render('index', [
            'monthlyReportDataProvider' => $monthlyReportDataProvider,
            'ytdReportDataProvider' => $ytdReportDataProvider,
            'yoyReportDataProvider' => $yoyReportDataProvider,
        ]);
    }
}
