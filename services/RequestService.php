<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 24.11.2018
 * Time: 21:45
 */

namespace app\services;


use app\models\Request;
use app\models\Task;
use yii\base\Component;
use yii\web\IdentityInterface;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class RequestService extends Component
{
    /**
     * @param IdentityInterface $user
     * @param Request $request
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Request $request)
    {
        return $user->getId() == $request->requester_id;
    }

    /**
     * @param $requester_id
     * @param $task_id
     * @return bool
     */
    public function canCreate($task_id, $requester_id)
    {
        $request = Request::find()->andWhere(['task_id' => $task_id, 'requester_id' => $requester_id])->exists();
        if ($request) {
            throw new AccessDeniedException("Вы уже сделали запрос на выполнение этой задачи!");
        }
        $task = Task::find()->andWhere(['id' => $task_id, 'owner_id' => $requester_id])->exists();
        if ($task) {
            throw new AccessDeniedException("Вы не можете делать запрос на выполнение своей задачи!");
        }
        return true;
    }
}