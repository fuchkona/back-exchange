<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 30.11.2018
 * Time: 0:17
 */

namespace app\services\events;


use yii\base\Event;

class AcceptTaskRequestEvent extends Event
{
    public $task;
    public $request;
    public $status_id;
}