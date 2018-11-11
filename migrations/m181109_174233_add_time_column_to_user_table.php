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
        $this->addColumn('user', 'time',
            $this->integer()->unsigned()->notNull()->after('email')
                ->defaultValue(0)->comment('Time in minutes'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'time');

        return true;
    }
}
