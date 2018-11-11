<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 11.11.2018
 * Time: 9:47
 */

namespace app\services;

use app\models\User;
use yii\web\IdentityInterface;

class UserService
{

    /**
     * @param IdentityInterface | User $user
     * @param array $roles
     * @return bool
     */
    public function checkUserRoles(IdentityInterface $user, array $roles){
        return in_array($user->role, $roles);
    }

}