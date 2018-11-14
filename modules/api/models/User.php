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
            'id',
            'username',
            'full_name',
            'email',
        ];
    }

    public function extraFields()
    {
        return [
            'time',
            'status',
            'created_at',
            'update_at'
        ];
    }

}
