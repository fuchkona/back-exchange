<?php

namespace app\controllers;

use app\controllers\base\DefaultBehaviorController;
use Yii;
use app\models\StatusesLog;
use app\models\StatusesLogSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * StatusesLogController implements the CRUD actions for StatusesLog model.
 */
class StatusesLogController extends DefaultBehaviorController
{
    /**
     * {@inheritdoc}
     */
    protected function customBehaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ]
        ];
    }

    /**
     * Lists all StatusesLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StatusesLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StatusesLog model.
     * @param integer $id
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
     * Creates a new StatusesLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StatusesLog();
        $tasks = \app\models\Task::find()->selectFields(['id as value', 'title as label']);
        $statuses = \app\models\Statuses::find()->select('title')->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'tasks' => $tasks,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Updates an existing StatusesLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tasks = \app\models\Task::find()->selectFields(['id as value', 'title as label']);
        $statuses = \app\models\Statuses::find()->select('title')->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'tasks' => $tasks,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Deletes an existing StatusesLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StatusesLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StatusesLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StatusesLog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
