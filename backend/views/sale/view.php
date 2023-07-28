<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sale */

$this->title = 'Detail Penjualan: KODE' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute' => 'product_id',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->product->product_name;
                                }
                            ],  
                            'amount',
                            [
                                'attribute' => 'sale_price',
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asCurrency($model->sale_price);
                                }
                            ],                               
                            [
                                'attribute' => 'customer_id',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->customer->customer_name;
                                }
                            ],                               
                            [
                                'attribute' => 'user_id',
                                'value' => function ($model) {
                                    return $model->user->username;
                                }
                            ], 
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>