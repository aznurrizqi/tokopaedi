<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use kartik\widgets\FileInput;
use kartik\date\DatePicker;
use common\models\UseRoom;
use common\models\Room;
use common\models\Unit;


/* @var $this yii\web\View */
/* @var $model common\models\UseRoom */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="use-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_id')
        ->dropDownList(ArrayHelper::map(Room::find()->orderBy('id ASC')->all(), 'id', 'name'), ['prompt' => 'Pilih Ruang']);          
    ?>

    <!-- <div class="row">
        <div class = "col-md-4">
            <?
            // echo \yii2fullcalendar\yii2fullcalendar::widget(array(
            //     'events'=> $events,
            //     ));
            ?>
        </div>
        <div class = "col-md-2">
            </div>
        <div class = "col-md-4">
            <h6><strong>Fasilitas Tambahan</strong></h6>
            <h6>A</h6>
            <h6>B</h6>
            <h6>C</h6>
        </div>
    </div>    

    </br> -->

    <?= $form->field($model, 'meeting_type')->dropDownList(UseRoom::getArrMeetingType(), ['prompt' => 'Pilih Jenis Rapat']); ?>

    <?= $form->field($model, 'unit_id')
        ->dropDownList(ArrayHelper::map(Unit::find()->orderBy('id ASC')->all(), 'id', 'name'), ['prompt' => 'Pilih Unit Kerja']);          
    ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'start_date')->widget(\kartik\date\DatePicker::classname(), [
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?=  $form->field($model, 'end_date')->widget(\kartik\date\DatePicker::classname(), [
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'file')->widget(FileInput::className(),                            [
            'model' => $model,
            'attribute' => 'file',
            'name' => 'file',
            'pluginOptions' => [
                'showPreview' => false,
                'showCaption' => true,
                'showRemove' => true,
                'showUpload' => false,
                'maxFileSize'=>500
            ],
            'options' => ['accept' => 'pdf/*'],
        ]
        );
    ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
