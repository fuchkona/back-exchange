<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StatusesLog;

/**
 * StatusesLogSearch represents the model behind the search form of `app\models\StatusesLog`.
 */
class StatusesLogSearch extends StatusesLog
{
    public $task;
    public $status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'task_id', 'status_id', 'created_at'], 'integer'],
            [['task', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = StatusesLog::find();
        $query->joinWith(['task', 'status']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['task'] = [
            'asc' => ['tasks.title' => SORT_ASC],
            'desc' => ['tasks.title' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['status'] = [
            'asc' => ['statuses.title' => SORT_ASC],
            'desc' => ['statuses.title' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'task_id' => $this->task_id,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'tasks.title', $this->task])
            ->andFilterWhere(['like', 'statuses.title', $this->status]);


        return $dataProvider;
    }
}
