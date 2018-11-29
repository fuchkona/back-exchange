<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 24.11.2018
 * Time: 21:07
 */

namespace app\modules\api\models;


class Request extends \app\models\Request
{


    public function fields()
    {
        return [
            'id',
            'task_id',
            'requester' => function(){
                return User::findOne($this->requester_id);
            },
            'need_time'
        ];
    }
}

