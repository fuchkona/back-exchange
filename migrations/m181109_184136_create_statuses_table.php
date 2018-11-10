<?php

use yii\db\Migration;

/**
 * Handles the creation of table `statuses`.
 */
class m181109_184136_create_statuses_table extends Migration
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

        $this->createTable('statuses', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('statuses');

        return true;
    }
}
