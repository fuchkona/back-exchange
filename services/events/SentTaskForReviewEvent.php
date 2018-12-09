<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 09.12.2018
 * Time: 19:25
 */

namespace app\services\events;


use yii\base\Event;

class SentTaskForReviewEvent extends Event
{
    public $task;
    public $status_id;
}