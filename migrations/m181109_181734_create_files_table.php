<?php

use yii\db\Migration;

/**
 * Handles the creation of table `files`.
 */
class m181109_181734_create_files_table extends Migration
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

        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'filename' => $this->string(300)->notNull(),
            'display_name' => $this->string(300)->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_files_tasks', 'files', ['task_id'],
            'tasks', ['id']);
        $this->addForeignKey('fk_files_user', 'files', ['user_id'],
            'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_files_tasks', 'files');
        $this->dropForeignKey('fk_files_user', 'files');
        $this->dropIndex('fk_files_tasks', 'files');
        $this->dropIndex('fk_files_user', 'files');

        $this->dropTable('files');

        return true;
    }
}
