<?php
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 08.11.18
 * Time: 22:16
 */

namespace app\modules\api\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $full_name;
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 6, 'max' => 255],
            ['full_name', 'required'],
            ['full_name', 'string', 'min' => 6, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return \app\models\User
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new \app\models\User();
        $user->username = $this->username;
        $user->full_name = $this->full_name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}