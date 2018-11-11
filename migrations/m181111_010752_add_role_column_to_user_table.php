<?php

use yii\db\Migration;

/**
 * Handles adding role to table `user`.
 */
class m181111_010752_add_role_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'role',
            $this->integer()->notNull()->after('email')
                ->defaultValue(0)->comment('Time in minutes'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
