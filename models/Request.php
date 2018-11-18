<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property int $task_id
 * @property int $requester_id
 * @property int $need_time
 *
 * @property Task $task
 * @property User $requester
 */
class Request extends \yii\db\ActiveRecord
{
    const RELATION_TASK = 'task';
    const RELATION_REQUESTER = 'requester';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'requester_id', 'need_time'], 'required'],
            [['task_id', 'requester_id', 'need_time'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['requester_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['requester_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'requester_id' => 'Requester ID',
            'need_time' => 'Need Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequester()
    {
        return $this->hasOne(User::className(), ['id' => 'requester_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\RequestQuery(get_called_class());
    }
}
