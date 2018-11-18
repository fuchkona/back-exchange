<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\User]].
 *
 * @see \app\models\User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @param array $fields Array of fields to select
     * Example for yii-jui: User::find()->selectFields([['id as value', 'full_name as label']]);
     *
     * @return \app\models\User[]|array
     */
    public function selectFields(array $fields)
    {
        return $this->select($fields)->asArray()->all();
    }


    /**
     * {@inheritdoc}
     * @return \app\models\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
