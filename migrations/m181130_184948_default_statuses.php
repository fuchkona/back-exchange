<?php

use yii\db\Migration;

/**
 * Class m181130_184948_default_statuses
 */
class m181130_184948_default_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('statuses', [
            'id' => 1,
            'title' => 'Новая задача'
        ]);
        $this->insert('statuses', [
            'id' => 2,
            'title' => 'В работе'
        ]);
        $this->insert('statuses', [
            'id' => 3,
            'title' => 'Выполнена'
        ]);
        $this->insert('statuses', [
            'id' => 4,
            'title' => 'Отменена'
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('statuses', [
            'id' => 1
        ]);
        $this->delete('statuses', [
            'id' => 2
        ]);
        $this->delete('statuses', [
            'id' => 3
        ]);
        $this->delete('statuses', [
            'id' => 4
        ]);
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181130_184948_default_statuses cannot be reverted.\n";

        return false;
    }
    */
}
