<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 07.12.2018
 * Time: 21:03
 */

namespace app\services\events;


use yii\base\Event;

class ConfirmTaskExecutionEvent extends Event
{
    public $task;
    public $status_id;
}