<?php

use yii\db\Migration;

/**
 * Class m181209_134446_add_default_statuses_into_table_statuses
 */
class m181209_134446_add_default_statuses_into_table_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('statuses', [
            'id' => 5,
            'title' => 'Отправлена исполнителем на проверку'
        ]);
        $this->insert('statuses', [
            'id' => 6,
            'title' => 'Исполнителем отправлен запрос на отказ от задачи'
        ]);
        $this->insert('statuses', [
            'id' => 7,
            'title' => 'Отправлена заказчиком на доработку'
        ]);
        $this->insert('statuses', [
            'id' => 8,
            'title' => 'Отмечена заказчиком как отменённая'
        ]);
        $this->insert('statuses', [
            'id' => 9,
            'title' => 'Просрочена'
        ]);
        $this->insert('statuses', [
            'id' => 10,
            'title' => 'В стадии спора'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('statuses', [
            'id' => 5
        ]);
        $this->delete('statuses', [
            'id' => 6
        ]);
        $this->delete('statuses', [
            'id' => 7
        ]);
        $this->delete('statuses', [
            'id' => 8
        ]);
        $this->delete('statuses', [
            'id' => 9
        ]);
        $this->delete('statuses', [
            'id' => 10
        ]);
        return true;
    }
}
