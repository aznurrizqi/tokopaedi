<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <center><h4>Profit / Loss Report</h4></center>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h5>Monthly Report (per <?= date('F'); ?>)</h5>
                        </div>
                    </div>

                    <?php Pjax::begin(); ?>

                    <?= GridView::widget([
                        'dataProvider' => $monthlyReportDataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'product_name',
                                'label' => 'Barang',
                            ],                               
                            [
                                'attribute' => 'total_purchase',
                                'label' => 'Jumlah Unit Pembelian',
                            ],                               
                            [
                                'attribute' => 'amount_purchase',
                                'label' => 'Jumlah Nilai Pembelian',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model['amount_purchase']);
                                }
                            ],                               
                            [
                                'attribute' => 'total_sale',
                                'label' => 'Jumlah Unit Penjualan',
                            ],                               
                            [
                                'attribute' => 'amount_sale',
                                'label' => 'Jumlah Nilai Penjualan',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model['amount_sale']);
                                }
                            ],                               
                            [
                                'attribute' => 'stock',
                                'label' => 'Jumlah Stok',
                            ],                               
                            [
                                'attribute' => 'profit',
                                'label' => 'Keuntungan / Kerugian',
                                'format' => 'raw',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    if (str_contains($model['profit'], '-')) {
                                        return '<p class="text-danger">'.Yii::$app->formatter->asCurrency($model['profit']).'</p>';
                                    } else {
                                        return '<p class="text-success">'.Yii::$app->formatter->asCurrency($model['profit']).'</p>';
                                    }
                                }
                            ],                               
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h5>Year to Date (YTD) Report (per <?= date("d F Y"); ?>)</h5>
                        </div>
                    </div>

                    <?php Pjax::begin(); ?>

                    <?= GridView::widget([
                        'dataProvider' => $ytdReportDataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'product_name',
                                'label' => 'Barang',
                            ],                               
                            [
                                'attribute' => 'total_purchase',
                                'label' => 'Jumlah Unit Pembelian',
                            ],                               
                            [
                                'attribute' => 'amount_purchase',
                                'label' => 'Jumlah Nilai Pembelian',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model['amount_purchase']);
                                }
                            ],                               
                            [
                                'attribute' => 'total_sale',
                                'label' => 'Jumlah Unit Penjualan',
                            ],                               
                            [
                                'attribute' => 'amount_sale',
                                'label' => 'Jumlah Nilai Penjualan',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model['amount_sale']);
                                }
                            ],                               
                            [
                                'attribute' => 'stock',
                                'label' => 'Jumlah Stok',
                            ],                               
                            [
                                'attribute' => 'profit',
                                'label' => 'Keuntungan / Kerugian',
                                'format' => 'raw',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    if (str_contains($model['profit'], '-')) {
                                        return '<p class="text-danger">'.Yii::$app->formatter->asCurrency($model['profit']).'</p>';
                                    } else {
                                        return '<p class="text-success">'.Yii::$app->formatter->asCurrency($model['profit']).'</p>';
                                    }
                                }
                            ],                               
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h5>Year over Year (YOY) Report (per <?= date("d F Y"); ?>)</h5>
                        </div>
                    </div>

                    <?php Pjax::begin(); ?>

                    <?= GridView::widget([
                        'dataProvider' => $yoyReportDataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'product_name',
                                'label' => 'Barang',
                            ],                               
                            [
                                'attribute' => 'total_purchase',
                                'label' => 'Jumlah Unit Pembelian',
                            ],                               
                            [
                                'attribute' => 'amount_purchase',
                                'label' => 'Jumlah Nilai Pembelian',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model['amount_purchase']);
                                }
                            ],                               
                            [
                                'attribute' => 'total_sale',
                                'label' => 'Jumlah Unit Penjualan',
                            ],                               
                            [
                                'attribute' => 'amount_sale',
                                'label' => 'Jumlah Nilai Penjualan',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model['amount_sale']);
                                }
                            ],                               
                            [
                                'attribute' => 'stock',
                                'label' => 'Jumlah Stok',
                            ],                               
                            [
                                'attribute' => 'profit',
                                'label' => 'Keuntungan / Kerugian',
                                'format' => 'raw',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    if (str_contains($model['profit'], '-')) {
                                        return '<p class="text-danger">'.Yii::$app->formatter->asCurrency($model['profit']).'</p>';
                                    } else {
                                        return '<p class="text-success">'.Yii::$app->formatter->asCurrency($model['profit']).'</p>';
                                    }
                                }
                            ],                               
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>

    </div>
</div>
