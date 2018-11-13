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
            'created_at',
            'updated_at',
            'owner',
            'worker',
        ];
    }

}