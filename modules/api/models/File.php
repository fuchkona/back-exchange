<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 03.12.2018
 * Time: 17:48
 */

namespace app\modules\api\models;


class File extends \app\models\File
{
    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'task_id',
            'user_id',
            'filename',
            'url',
            'display_name',
            'description',
        ];
    }

    /**
     * @return array
     */
    public function extraFields()
    {
        return [
            'task' => function(){
                return \app\models\Task::findOne($this->task_id);
            },
            'user' => function(){
                return \app\models\User::findOne($this->user_id);
            },
        ];
    }
}