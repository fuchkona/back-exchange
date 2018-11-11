<?php

use yii\db\Migration;

/**
 * Handles adding time to table `user`.
 */
class m181109_174233_add_time_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'role',
            $this->integer()->notNull()->after('status')
                ->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'role');

        return true;
    }
}
