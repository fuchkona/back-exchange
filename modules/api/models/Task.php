<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 13.11.2018
 * Time: 19:46
 */

namespace app\modules\api\models;


class Task extends \app\models\Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'owner_id', 'deadline'], 'required'],
            [['description'], 'string'],
            [['owner_id', 'worker_id', 'contract_time', 'deadline'], 'integer'],
            ['deadline', 'default', 'value' => null],
            [['title'], 'string', 'max' => 300],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner_id' => 'id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }


    public function fields()
    {
        return [
            'id',
            'title',
            'description',
            'contract_time',
            'deadline',
            'currentStatus',
            'created_at',
            'updated_at',
            'owner' => function(){
                return User::findOne($this->owner_id);
            },
            'worker' => function(){
                return User::findOne($this->worker_id);
            },
        ];
    }

}