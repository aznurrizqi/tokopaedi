<?php

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = 'Update Pelanggan: ' . $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Pelanggan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>