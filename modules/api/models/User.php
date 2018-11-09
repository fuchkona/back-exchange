<?php
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 10.11.18
 * Time: 1:45
 */

namespace app\modules\api\models;


class User extends \app\models\User
{

    public function fields()
    {
        return [
            'username',
            'full_name',
            'email',
            'token' => 'auth_key',
        ];
    }

}