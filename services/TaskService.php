<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 01.12.2018
 * Time: 1:11
 */

namespace app\services;

use app\models\Request;
use app\services\events\AcceptTaskRequestEvent;
use yii\base\Component;
use app\services\events\CreateTaskEvent;
use app\models\Task;

class TaskService extends Component
{
    const EVENT_CREATE_TASK = 'create_task';
    const EVENT_ACCEPT_TASK_REQUEST = 'accept_task_request';

    /**
     * @param Task $task
     */
    public function createTask (Task $task)
    {
        $event = new CreateTaskEvent();
        $event->task = $task;
        $event->status_id = \Yii::$app->params['newTaskStatusId'];
        $this->trigger(self::EVENT_CREATE_TASK, $event);
    }

    /**
     * @param Task $task
     * @param Request $request
     */
    public function acceptTaskRequest(Task $task, Request $request)
    {
        $event = new AcceptTaskRequestEvent();
        $event->task = $task;
        $event->request = $request;
        $event->status_id = \Yii::$app->params['taskAtWorkStatusId'];
        $this->trigger(self::EVENT_ACCEPT_TASK_REQUEST, $event);
    }
}