<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Comment]].
 *
 * @see \app\models\Comment
 */
class CommentQuery extends \yii\db\ActiveQuery
{
    public function byTask($taskId)
    {
        return $this->andWhere(['task_id' => $taskId]);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Comment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Comment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
