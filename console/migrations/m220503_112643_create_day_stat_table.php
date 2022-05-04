<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%day_stat}}`.
 */
class m220503_112643_create_day_stat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%day_stat}}', [
            'id' => $this->primaryKey(),
            'year' => $this->smallInteger()->notNull(),
            'month' => $this->smallInteger()->notNull(),
            'day' => $this->tinyInteger()->notNull(),
            'date' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%day_stat}}');
    }
}
