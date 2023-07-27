<?php

namespace frontend\controllers;

use Yii;
use common\models\UseRoom;
use common\models\UseRoomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UseRoomController implements the CRUD actions for UseRoom model.
 */
class UseRoomController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UseRoom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UseRoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UseRoom model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UseRoom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $events = UseRoom::find()->all();

        $tasks = [];

        foreach ($events as $eve) {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->id;
            $event->title = $eve->pic;
            $event->start =  $eve->start_date;
            $tasks[] = $event;
        }

        $model = new UseRoom();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                // \Yii::$app->session->setFlash('success', 'Data Berhasil Disimpan.');
                return $this->redirect(['index']);
            }
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'events' => $tasks
        ]);
    }

    /**
     * Updates an existing UseRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $events = UseRoom::find()->all();

        $tasks = [];

        foreach ($events as $eve) {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->id;
            $event->title = $eve->pic;
            $event->start =  $eve->start_date;
            $tasks[] = $event;
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'events' => $events
        ]);
    }

    /**
     * Deletes an existing UseRoom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UseRoom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return UseRoom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UseRoom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
