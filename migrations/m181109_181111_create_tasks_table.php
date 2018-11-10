<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181109_181111_create_tasks_table extends Migration
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

        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'title' => $this->string(300)->notNull(),
            'description' => $this->text()->notNull(),
            'owner_id' => $this->integer()->notNull(),
            'worker_id' => $this->integer(),
            'contract_time' => $this->integer(),
            'deadline' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_tasks_user', 'tasks', ['owner_id'],
            'user', ['id']);
        $this->addForeignKey('fk_tasks_user_2', 'tasks', ['worker_id'],
            'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tasks_user', 'tasks');
        $this->dropForeignKey('fk_tasks_user_2', 'tasks');
        $this->dropIndex('fk_tasks_user', 'tasks');
        $this->dropIndex('fk_tasks_user_2', 'tasks');


        $this->dropTable('tasks');

        return true;
    }
}
