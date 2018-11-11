<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "statuses_log".
 *
 * @property int $id
 * @property int $task_id
 * @property int $status_id
 * @property int $created_at
 *
 * @property Statuses $status
 * @property Task $task
 */
class StatusesLog extends \yii\db\ActiveRecord
{
    const RELATION_STATUS = 'status';
    const RELATION_TASK = 'task';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statuses_log';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'status_id'], 'required'],
            [['task_id', 'status_id'], 'integer'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
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
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\StatusesLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\StatusesLogQuery(get_called_class());
    }
}
