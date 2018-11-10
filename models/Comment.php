<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $task_id
 * @property int $author_id
 * @property string $text
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Task $task
 * @property User $author
 */
class Comment extends \yii\db\ActiveRecord
{
    const RELATION_TASK = 'task';
    const RELATION_AUTHOR = 'author';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'author_id', 'text', 'created_at', 'updated_at'], 'required'],
            [['task_id', 'author_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['id'], 'safe'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
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
            'author_id' => 'Author ID',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CommentQuery(get_called_class());
    }
}
