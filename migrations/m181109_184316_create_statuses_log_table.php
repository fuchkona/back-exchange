<?php

use yii\db\Migration;

/**
 * Handles the creation of table `statuses_log`.
 */
class m181109_184316_create_statuses_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('statuses_log', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_statuses_log_tasks', 'statuses_log', ['task_id'],
            'tasks', ['id']);
        $this->addForeignKey('fk_statuses_log_statuses', 'statuses_log', ['status_id'],
            'statuses', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_statuses_log_tasks', 'statuses_log');
        $this->dropForeignKey('fk_statuses_log_statuses', 'statuses_log');
        $this->dropIndex('fk_statuses_log_tasks', 'statuses_log');
        $this->dropIndex('fk_statuses_log_statuses', 'statuses_log');

        $this->dropTable('statuses_log');

        return true;
    }
}
