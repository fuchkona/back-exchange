<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 30.11.2018
 * Time: 1:00
 */

namespace app\services;

use app\models\StatusesLog;
use yii\base\Component;

class StatusesLogService extends Component
{
    /**
     * @param $task_id
     * @param $status_id
     * @return bool
     */
    public function createStatusesLog ($task_id, $status_id)
    {
       $model =  new StatusesLog(['task_id' => $task_id, 'status_id' => $status_id]);
       return $model->save();
    }
}