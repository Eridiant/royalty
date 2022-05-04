<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_by_day}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%day_stat}}`
 */
class m220504_121540_create_page_by_day_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_by_day}}', [
            'id' => $this->primaryKey(),
            'data_id' => $this->integer()->notNull(),
            'page' => $this->smallInteger()->notNull(),
        ]);

        // creates index for column `data_id`
        $this->createIndex(
            '{{%idx-page_by_day-data_id}}',
            '{{%page_by_day}}',
            'data_id'
        );

        // add foreign key for table `{{%day_stat}}`
        $this->addForeignKey(
            '{{%fk-page_by_day-data_id}}',
            '{{%page_by_day}}',
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
            '{{%fk-page_by_day-data_id}}',
            '{{%page_by_day}}'
        );

        // drops index for column `data_id`
        $this->dropIndex(
            '{{%idx-page_by_day-data_id}}',
            '{{%page_by_day}}'
        );

        $this->dropTable('{{%page_by_day}}');
    }
}
