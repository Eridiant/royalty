<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_stat}}`.
 */
class m220502_153818_create_data_stat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data_stat}}', [
            'id' => $this->primaryKey(),
            'year' => $this->smallInteger()->notNull(),
            'month' => $this->smallInteger()->notNull(),
            'day' => $this->tinyInteger()->notNull(),
            'hour' => $this->tinyInteger()->notNull(),
            'date' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data_stat}}');
    }
}
