<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_new}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%day_stat}}`
 */
class m220503_112938_create_user_new_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_new}}', [
            'id' => $this->primaryKey(),
            'data_id' => $this->integer()->notNull(),
            'user' => $this->smallInteger()->notNull(),
        ]);

        // creates index for column `data_id`
        $this->createIndex(
            '{{%idx-user_new-data_id}}',
            '{{%user_new}}',
            'data_id'
        );

        // add foreign key for table `{{%day_stat}}`
        $this->addForeignKey(
            '{{%fk-user_new-data_id}}',
            '{{%user_new}}',
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
            '{{%fk-user_new-data_id}}',
            '{{%user_new}}'
        );

        // drops index for column `data_id`
        $this->dropIndex(
            '{{%idx-user_new-data_id}}',
            '{{%user_new}}'
        );

        $this->dropTable('{{%user_new}}');
    }
}
