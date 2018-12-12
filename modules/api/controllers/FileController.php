<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 03.12.2018
 * Time: 18:48
 */

namespace app\modules\api\controllers;


use app\models\Task;
use app\modules\api\models\File;
use Yii;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\web\ConflictHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;


/**
 * Class FileController
 * @package app\modules\api\controllers
 */
class FileController extends ActiveController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rules, $action) {
                            $currentUser = Yii::$app->user->identity;
                            $file = File::findOne(['id' => Yii::$app->request->get('file_id')]);

                            if (isset($file)){
                                return Yii::$app->fileService->areYouOwner($currentUser, $file)
                                    && !Yii::$app->taskService->haveCurrentStatus($file->task, Yii::$app->params['taskCompletedStatusId']);
                            }
                            else{
                                throw new NotFoundHttpException('File is not found');
                            }
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['my-files', 'index', 'load-file', 'create'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['files-by-task'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rules, $action) {
                            $currentUser = Yii::$app->user->identity;
                            $task = Task::findOne(['id' => Yii::$app->request->get('task_id')]);

                            return Yii::$app->taskService->areYouWorker($currentUser, $task)
                                    || Yii::$app->taskService->areYouOwner($currentUser, $task);

                        },

                    ]
                ],
                'denyCallback' => function () {
                    throw new ForbiddenHttpException('Вы не являетесь исполнителем или владельцем данной задачи,
                    права доступа ограничены');
                }
            ],
        ];
    }

    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\modules\api\models\File';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['delete']);

        return $actions;
    }

    /**
     * @return array
     */
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['my-files'] = ['GET', 'HEAD'];
        $verbs['files-by-task'] = ['GET', 'HEAD'];
        $verbs['load-file'] = ['GET', 'HEAD'];
        $verbs['create'] = ['POST'];
        return $verbs;
    }

    /**
     * @return ActiveDataProvider
     */
    public function actionMyFiles ()
    {
        $query = File::find()->byUser(\Yii::$app->user->identity);

        $requestParams = \Yii::$app->getRequest()->getQueryParams();

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
            ],
            'sort' => [
                'params' => $requestParams,
            ],
        ]);
    }

    /**
     * @param $task_id
     * @return ActiveDataProvider
     */
    public function actionFilesByTask ($task_id)
    {
        $query = File::find()->byTask($task_id);



        $task = Task::findOne($task_id);

        if ($task->owner_id !== \Yii::$app->user->id && $task->worker_id !== \Yii::$app->user->id) {
            throw new ConflictHttpException("Файлы не будут загружены, у вас нет прав для просмотра файлов");
        }

        $requestParams = \Yii::$app->getRequest()->getQueryParams();

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
            ],
            'sort' => [
                'params' => $requestParams,
            ],
        ]);
    }

    /**
     * @param $id
     * @return \yii\console\Response|\yii\web\Response
     */
    public function actionLoadFile($id)
    {

        $model = File::findOne($id);

        $filePath = \Yii::$app->basePath . '/web/files/'. $model->user_id . '/' . $model->filename;

        return \Yii::$app->response->sendFile($filePath, $model->filename);
    }

    /**
     * @return File
     */
    public function actionCreate() {
        $model = new File();
        $model->setScenario(File::SCENARIO_FILE_CREATE);
        $model->load(\Yii::$app->request->bodyParams, '');
        $model->file = \yii\web\UploadedFile::getInstanceByName('file');
        $model->setFields();
        $model->save();
        $model->uploadFile($model->filePath);

        return $model;
    }

    /**
     * @param $file_id
     * @return array
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($file_id)
    {
        $file = File::findOne($file_id);
        if (!$file) {
            throw new NotFoundHttpException("File is not found.");
        }
        $file->delete();
        return [
            'id' => $file_id,
        ];
    }
}