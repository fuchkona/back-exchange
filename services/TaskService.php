<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 01.12.2018
 * Time: 1:11
 */

namespace app\services;

use yii\base\Component;
use app\services\events\CreateTaskEvent;
use app\models\Task;

class TaskService extends Component
{
    const EVENT_CREATE_TASK = 'create_task';

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
}