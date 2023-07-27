<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Product;
use common\models\Supplier;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembelian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Tambah Pembelian', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'product_id',
                                'format' => 'raw',
                                'filter' => Html::activeDropDownList($searchModel, 'product_id', ArrayHelper::map(Product::find()->all(), 'id', 'product_name'), ['prompt' => 'Semua Barang', 'class' => 'form-control']),
                                'value' => function ($model) {
                                    return $model->product->product_name;
                                }
                            ],                               
                            'amount',
                            [
                                'attribute' => 'purchase_price',
                                'contentOptions' => ['style' => 'text-align:right;'],
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model->purchase_price);
                                }
                            ],                               
                            [
                                'attribute' => 'supplier_id',
                                'format' => 'raw',
                                'filter' => Html::activeDropDownList($searchModel, 'supplier_id', ArrayHelper::map(Supplier::find()->all(), 'id', 'supplier_name'), ['prompt' => 'Semua Pemasok', 'class' => 'form-control']),
                                'value' => function ($model) {
                                    return $model->supplier->supplier_name;
                                }
                            ],                               
                            // 'user_id',

                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
