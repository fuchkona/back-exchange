<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 25.11.2018
 * Time: 19:13
 */

namespace app\modules\api\models;

use yii\base\Model;


/**
 * Password change form
 */
class PasswordChangeForm extends Model
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;

    /**
     * @var User
     */
    private $_user;

    /**
     * @param \app\models\User $user
     * @param array $config
     */
    public function __construct(\app\models\User $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'newPasswordRepeat'], 'required'],
            ['currentPassword', 'validatePassword'],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword',
                'message' => 'Passwords do not match'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'newPassword' => 'Новый пароль',
            'newPasswordRepeat' =>  'Старый пароль',
            'currentPassword' => 'Повторите пароль',
        ];
    }

    public function fields()
    {
        return [
            'oldPassword' => 'currentPassword',
            'newPassword',
        ];
    }

    /**
     * @param string $attribute
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            if (!$this->_user->validatePassword($this->currentPassword)) {
                $this->addError($attribute, 'Не верный пароль');
            }
        }
    }

    /**
     * @return boolean
     */
    public function changePassword()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->setPassword($this->newPassword);
            return $user->save();
        } else {
            return false;
        }
    }
}