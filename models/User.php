<?php

namespace app\models;


use yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $full_name
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $time
 * @property string $auth_key
 * @property integer $status
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
 * @property Task[] $createdTasks
 * @property Task[] $tasksPerformed
 * @property Portfolio[] $portfolio
 * @property File[] $files
 * @property Comment[] $comments
 * @property Request[] $requests

 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_LIST = [
        self::STATUS_DELETED => 'удален',
        self::STATUS_ACTIVE => 'активен'
    ];

    const SCENARIO_ADMIN_CREATE = 'admin_create';
    const SCENARIO_ADMIN_UPDATE = 'admin_update';
    const SCENARIO_USER_UPDATE = 'user_update';


    const RELATION_CREATED_TASKS = 'createdTasks';
    const RELATION_TASKS_PERFORMED = 'tasksPerformed';
    const RELATION_PORTFOLIO = 'portfolio';
    const RELATION_FILES = 'files';
    const RELATION_COMMENTS = 'comments';
    const RELATION_REQUESTS = 'requests';


    const ROLE_USER = 0;
    const ROLE_MODERATOR = 123;
    const ROLE_ADMIN = 255;

    const ROLE_LIST = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_MODERATOR => 'Moderator',
        self::ROLE_USER => 'User'
    ];

    private $password;

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'username',
            'full_name',
            'email',
            'token' => 'auth_key',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'full_name', 'password_hash', 'password_reset_token', 'auth_key'], 'string'],
            [['time', 'status', 'role'], 'integer'],
            [['email'], 'email'],
            [['password'], 'string', 'min' => 6],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['username', 'full_name', 'email'], 'required',
                'on' => [self::SCENARIO_ADMIN_CREATE, self::SCENARIO_ADMIN_UPDATE, self::SCENARIO_USER_UPDATE]],
            [['username', 'email'], 'unique',
                'on' => [self::SCENARIO_ADMIN_CREATE, self::SCENARIO_ADMIN_UPDATE, self::SCENARIO_USER_UPDATE]],
            [['password'], 'required', 'on' => self::SCENARIO_ADMIN_CREATE],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'full_name' => 'Full name',
            'auth_key' => 'Auth key',
            'password_hash' => 'Password hash',
            'password_reset_token' => 'Password reset token',
            'email' => 'Email',
            'time' => 'Time',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if($insert) {
            $this->generateAuthKey();
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by email
     *
     * @param $email
     * @return User|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        if ($password) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        }
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedTasks()
    {
        return $this->hasMany(Task::className(), ['owner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasksPerformed()
    {
        return $this->hasMany(Task::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasMany(Portfolio::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['requester_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UserQuery(get_called_class());
    }


}