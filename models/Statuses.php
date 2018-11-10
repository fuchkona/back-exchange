<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statuses".
 *
 * @property int $id
 * @property string $title
 *
 * @property StatusesLog[] $statusesLogs
 */
class Statuses extends \yii\db\ActiveRecord
{
    const RELATION_STATUSES_LOGS = 'statusesLogs';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 150],
            [['id'], 'safe']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusesLogs()
    {
        return $this->hasMany(StatusesLog::className(), ['status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\StatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\StatusesQuery(get_called_class());
    }
}
