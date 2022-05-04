<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_chart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%day_stat}}`
 */
class m220503_112830_create_user_chart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_chart}}', [
            'id' => $this->primaryKey(),
            'data_id' => $this->integer()->notNull(),
            'user' => $this->smallInteger()->notNull(),
        ]);

        // creates index for column `data_id`
        $this->createIndex(
            '{{%idx-user_chart-data_id}}',
            '{{%user_chart}}',
            'data_id'
        );

        // add foreign key for table `{{%day_stat}}`
        $this->addForeignKey(
            '{{%fk-user_chart-data_id}}',
            '{{%user_chart}}',
            'data_id',
            '{{%day_stat}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%day_stat}}`
        $this->dropForeignKey(
            '{{%fk-user_chart-data_id}}',
            '{{%user_chart}}'
        );

        // drops index for column `data_id`
        $this->dropIndex(
            '{{%idx-user_chart-data_id}}',
            '{{%user_chart}}'
        );

        $this->dropTable('{{%user_chart}}');
    }
}
