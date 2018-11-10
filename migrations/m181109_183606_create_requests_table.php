<?php

use yii\db\Migration;

/**
 * Handles the creation of table `requests`.
 */
class m181109_183606_create_requests_table extends Migration
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


        $this->createTable('requests', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'requester_id' => $this->integer()->notNull(),
            'need_time' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_requests_tasks', 'requests', ['task_id'],
            'tasks', ['id']);
        $this->addForeignKey('fk_requests_user', 'requests', ['requester_id'],
            'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_requests_tasks', 'requests');
        $this->dropForeignKey('fk_requests_user', 'requests');
        $this->dropIndex('fk_requests_tasks', 'requests');
        $this->dropIndex('fk_requests_user', 'requests');

        $this->dropTable('requests');

        return true;
    }
}
