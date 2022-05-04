<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_chart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%data_stat}}`
 */
class m220502_173806_create_page_chart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_chart}}', [
            'id' => $this->primaryKey(),
            'data_id' => $this->integer()->notNull(),
            'page' => $this->smallInteger()->notNull(),
        ]);

        // creates index for column `data_id`
        $this->createIndex(
            '{{%idx-page_chart-data_id}}',
            '{{%page_chart}}',
            'data_id'
        );

        // add foreign key for table `{{%data_stat}}`
        $this->addForeignKey(
            '{{%fk-page_chart-data_id}}',
            '{{%page_chart}}',
            'data_id',
            '{{%data_stat}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%data_stat}}`
        $this->dropForeignKey(
            '{{%fk-page_chart-data_id}}',
            '{{%page_chart}}'
        );

        // drops index for column `data_id`
        $this->dropIndex(
            '{{%idx-page_chart-data_id}}',
            '{{%page_chart}}'
        );

        $this->dropTable('{{%page_chart}}');
    }
}
