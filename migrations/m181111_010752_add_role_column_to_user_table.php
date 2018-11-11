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
            $this->smallInteger()->unsigned()->notNull()->after('status')
                ->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'role');
    }
}
