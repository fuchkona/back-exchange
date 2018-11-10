<?php

use yii\db\Migration;

/**
 * Handles the creation of table `portfolio`.
 */
class m181109_181210_create_portfolio_table extends Migration
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

        $this->createTable('portfolio', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(300)->notNull(),
            'description' => $this->text()->notNull(),
            'url' => $this->string(300)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_portfolio_user', 'portfolio', ['user_id'],
            'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_portfolio_user', 'portfolio');
        $this->dropIndex('fk_portfolio_user', 'portfolio');

        $this->dropTable('portfolio');

        return true;
    }
}
