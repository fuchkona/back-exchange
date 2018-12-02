<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\File]].
 *
 * @see \app\models\File
 */
class FileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @param $task_id
     * @return FileQuery
     */
    public function byTask ($task_id) {
        return $this->andWhere(['task_id' => $task_id]);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\File[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\File|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
