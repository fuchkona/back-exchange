<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 13.11.2018
 * Time: 19:46
 */

namespace app\modules\api\models;


class Task extends \app\models\Task
{

    public function fields()
    {
        return [
            'id',
            'title',
            'description',
            'contract_time',
            'deadline',
            'currentStatus',
            'created_at',
            'updated_at',
            'owner' => function(){
                return User::findOne($this->owner_id);
            },
            'worker' => function(){
                return User::findOne($this->worker_id);
            },
        ];
    }

}