<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $owner_id
 * @property int $worker_id
 * @property int $contract_time
 * @property int $deadline
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Comment[] $comments
 * @property File[] $files
 * @property Request[] $requests
 * @property StatusesLog[] $statusesLogs
 * @property User $owner
 * @property User $worker
 */
class Task extends \yii\db\ActiveRecord
{
    const RELATION_COMMENTS = 'comments';
    const RELATION_FILES = 'files';
    const RELATION_REQUESTS = 'requests';
    const RELATION_STATUSES_LOGS = 'statusesLogs';
    const RELATION_OWNER = 'owner';
    const RELATION_WORKER = 'worker';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'owner_id', 'deadline'], 'required'],
            [['description'], 'string'],
            [['owner_id', 'worker_id', 'contract_time', 'deadline'], 'integer'],
            [['title'], 'string', 'max' => 300],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner_id' => 'id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'owner_id' => 'Owner ID',
            'worker_id' => 'Worker ID',
            'contract_time' => 'Contract Time',
            'deadline' => 'Deadline',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusesLogs()
    {
        return $this->hasMany(StatusesLog::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(User::className(), ['id' => 'worker_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TaskQuery(get_called_class());
    }
}
