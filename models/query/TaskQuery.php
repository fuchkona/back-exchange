<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Task]].
 *
 * @see \app\models\Task
 */
class TaskQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @param array $fields Array of fields to select
     * Example for yii-jui: Task::find()->selectFields([['id as value', 'title as label']]);
     *
     * @return \app\models\Task[]|array
     */
    public function selectFields(array $fields)
    {
        return $this->select($fields)->asArray()->all();
    }

    /**
     * @param $worker_id
     * @return TaskQuery
     */
    public function byWorker ($worker_id) {
        return $this->andWhere(['worker_id' => $worker_id]);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Task[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Task|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
