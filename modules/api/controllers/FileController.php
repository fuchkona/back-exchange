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
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use Symfony\Component\Finder\Exception\AccessDeniedException;


/**
 * Class FileController
 * @package app\modules\api\controllers
 */
class FileController extends ActiveController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\modules\api\models\File';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);

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

        if ($task['owner_id'] !== \Yii::$app->user->id && $task['worker_id'] !== \Yii::$app->user->id) {
            throw new AccessDeniedException("Access error. You are not owner or worker of this task!");
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
     * @return File
     */
    public function actionCreate() {
        $model = new File();
        $model->setScenario(File::SCENARIO_FILE_CREATE);
        $model->load(\Yii::$app->request->bodyParams, '');
        $model->file = \yii\web\UploadedFile::getInstanceByName('file');
        $model->save();
        $model->upload();
        return $model;
    }
}