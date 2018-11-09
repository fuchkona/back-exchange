<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m181109_182256_create_comments_table extends Migration
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

        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_comments_tasks', 'comments', ['task_id'],
            'tasks', ['id']);
        $this->addForeignKey('fk_comments_user', 'comments', ['author_id'],
            'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_comments_tasks', 'comments');
        $this->dropForeignKey('fk_comments_user', 'comments');
        $this->dropIndex('fk_comments_tasks', 'comments');
        $this->dropIndex('fk_comments_user', 'comments');

        $this->dropTable('comments');

        return true;
    }
}
