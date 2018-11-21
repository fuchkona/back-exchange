<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;

/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */
class TaskSearch extends Task
{
    public $owner;
    public $worker;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'owner_id', 'worker_id', 'contract_time', 'deadline', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'owner', 'worker'], 'safe'],
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
        $query = Task::find();

        $query->joinWith([Task::RELATION_OWNER, Task::RELATION_WORKER]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['owner'] = [
            'asc' => ['owner.full_name' => SORT_ASC],
            'desc' => ['owner.full_name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['worker'] = [
            'asc' => ['worker.full_name' => SORT_ASC],
            'desc' => ['worker.full_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'owner_id' => $this->owner_id,
            'worker_id' => $this->worker_id,
            'contract_time' => $this->contract_time,
            'deadline' => $this->deadline,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'owner.full_name', $this->owner])
            ->andFilterWhere(['like', 'worker.full_name', $this->worker]);

        return $dataProvider;
    }
}
