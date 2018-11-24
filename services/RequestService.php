<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 24.11.2018
 * Time: 21:45
 */

namespace app\services;


use app\models\Request;
use yii\web\IdentityInterface;

class RequestService
{
    public static function canDelete(IdentityInterface $user, Request $request)
    {
        return $user->getId() == $request->requester_id;
    }
}