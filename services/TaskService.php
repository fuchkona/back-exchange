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
use app\services\events\ConfirmTaskExecutionEvent;
use app\services\events\SentTaskForReviewEvent;
use yii\base\Component;
use app\services\events\CreateTaskEvent;
use app\models\Task;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use yii\web\NotFoundHttpException;
use yii\web\IdentityInterface;

class TaskService extends Component
{
    const EVENT_CREATE_TASK = 'create_task';
    const EVENT_ACCEPT_TASK_REQUEST = 'accept_task_request';
    const EVENT_CONFIRM_TASK_EXECUTION = 'confirm_task_execution';
    const EVENT_SENT_TASK_FOR_REVIEW = 'sent_task_for_review';

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

    /**
     * @param Task $task
     */
    public function confirmTaskExecution (Task $task)
    {
        $event = new ConfirmTaskExecutionEvent();
        $event->task = $task;
        $event->status_id = \Yii::$app->params['taskCompletedStatusId'];
        $this->trigger(self::EVENT_CONFIRM_TASK_EXECUTION, $event);
    }

    /**
     * @param Task $task
     */
    public function sendTaskForReview (Task $task)
    {
        $event = new SentTaskForReviewEvent();
        $event->task = $task;
        $event->status_id = \Yii::$app->params['taskSentForReviewByTheWorkerStatusId'];
        $this->trigger(self::EVENT_SENT_TASK_FOR_REVIEW, $event);
    }

    /**
     * @param IdentityInterface $user
     * @param Task $task
     * @return bool
     */
    public function areYouOwner (IdentityInterface $user, Task $task)
    {
        if ($user->getId() === $task->owner_id) {
            return true;
        } else {
            throw new AccessDeniedException("Вы не являетесь владельцем данной задачи!");
        }

    }

    /**
     * @param IdentityInterface $user
     * @param Task $task
     * @return bool
     * @throws NotFoundHttpException
     */
    public function areYouWorker (IdentityInterface $user, Task $task)
    {
        if ($task->worker_id) {
            if ($user->getId() === $task->worker_id) {
                return true;
            } else {
                throw new AccessDeniedException("Вы не являетесь исполнителем данной задачи!");
            }
        } else {
            throw new NotFoundHttpException("У данной задачи нет исполнителя!");
        }
    }

    /**
     * @param Task $task
     * @param int $status
     * @return bool
     */
    public function haveCurrentStatus (Task $task, $status)
    {
        if ($task->currentStatus->id === $status) {
            return true;
        } else {
            return false;
        }
    }
}

