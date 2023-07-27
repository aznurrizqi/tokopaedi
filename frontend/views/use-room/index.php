<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Room;
use common\models\Unit;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UseRoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pinjam Ruang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Ajukan Pinjam Ruang', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'room_id',
                            [
				                'attribute' => 'meeting_type',
				                'format' => 'raw',
				                'headerOptions' => ['style' => 'width:10%'],
				                'value' => function($model) {
    				                switch ($model->meeting_type) {
    				                    case 0:
    				                        return 'Pemeriksaan';
    				                        break;
    				                    case 1:
    				                        return 'Non Pemeriksaan';
    				                        break;
    				                    default:
    				                        break;
					                }
				                }
			                ],
                            [
                                'attribute' => 'unit_id',
                                'format' => 'raw',
                                'filter' => Html::activeDropDownList($searchModel, 'unit_id', ArrayHelper::map(Unit::find()->all(), 'id', 'name'), ['prompt' => 'Semua Unit Kerja', 'class' => 'form-control']),
                                'value' => function ($model) {
                                    return $model->unit->name;
                                }
                            ],
                            'pic',
                            'start_date',
                            'end_date',
                            //'file',
                            //'note:ntext',
                            // 'status',
                            [
				                'attribute' => 'status',
				                'format' => 'raw',
				                'headerOptions' => ['style' => 'width:10%'],
				                'value' => function($model) {
    				                switch ($model->status) {
    				                    case 0:
    				                        return 'Diajukan';
    				                        break;
    				                    case 1:
    				                        return 'Disetujui';
    				                        break;
    				                    case 2:
    				                        return 'Selesai';
    				                        break;
                                        case 3:
                                            return 'Ditolak';
                                            break;
                                        default:
    				                        break;
					                }
				                }
			                ],


                            // ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
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
