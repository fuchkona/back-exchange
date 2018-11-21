<?php

namespace app\controllers;

use app\controllers\base\DefaultBehaviorController;
use Yii;
use app\models\File;
use app\models\FileSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FileController implements the CRUD actions for File model.
 */
class FileController extends DefaultBehaviorController
{

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
     * Lists all File models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single File model.
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
     * Creates a new File model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new File();
        $tasks = \app\models\Task::find()->selectFields(['id as value', 'title as label']);
        $users = \app\models\User::find()->selectFields(['id as value', 'full_name as label']);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'tasks' => $tasks,
            'users' => $users,
        ]);
    }

    /**
     * Updates an existing File model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tasks = \app\models\Task::find()->selectFields(['id as value', 'title as label']);
        $users = \app\models\User::find()->selectFields(['id as value', 'full_name as label']);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'tasks' => $tasks,
            'users' => $users,
        ]);
    }

    /**
     * Deletes an existing File model.
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
     * @param $id
     * @return \yii\console\Response|\yii\web\Response
     */
    public function actionLoadFile($id)
    {

        $model = File::findOne($id);

        $filePath = Yii::$app->basePath . '/web/files/'. $model->user_id . '/' . $model->filename;

        return Yii::$app->response->sendFile($filePath, $model->filename);
    }

    /**
     * Finds the File model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return File the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = File::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
