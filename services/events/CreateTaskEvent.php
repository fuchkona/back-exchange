<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 30.11.2018
 * Time: 0:17
 */

namespace app\services\events;


use yii\base\Event;

class CreateTaskEvent extends Event
{
    public $task;
    public $status_id;
}