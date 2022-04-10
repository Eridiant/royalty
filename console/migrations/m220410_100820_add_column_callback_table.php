<?php

use yii\db\Migration;

/**
 * Class m220410_100820_add_column_callback_table
 */
class m220410_100820_add_column_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%callback}}', 'country', $this->string(255)->after('lang'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%callback}}', 'country');
    }
}
