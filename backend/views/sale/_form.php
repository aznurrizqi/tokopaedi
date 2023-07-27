<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\ProductSearch;
use common\models\CustomerSearch;

/* @var $this yii\web\View */
/* @var $model common\models\Sale */
/* @var $form yii\bootstrap4\ActiveForm */

$modelProductSearch = new ProductSearch();
$modelCustomerSearch = new CustomerSearch();
?>

<div class="sale-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
        'data' => $modelProductSearch->getProductList(),
        'options' => ['placeholder' => 'Pilih Barang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'sale_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->widget(Select2::classname(), [
        'data' => $modelCustomerSearch->getCustomerList(),
        'options' => ['placeholder' => 'Pilih Pelanggan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
