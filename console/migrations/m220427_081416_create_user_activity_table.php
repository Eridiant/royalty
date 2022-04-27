<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_activity}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user_ip}}`
 */
class m220427_081416_create_user_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_activity}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'url' => $this->string(255),
            'ref' => $this->string(255),
            'device' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_activity-user_id}}',
            '{{%user_activity}}',
            'user_id'
        );

        // add foreign key for table `{{%user_ip}}`
        $this->addForeignKey(
            '{{%fk-user_activity-user_id}}',
            '{{%user_activity}}',
            'user_id',
            '{{%user_ip}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user_ip}}`
        $this->dropForeignKey(
            '{{%fk-user_activity-user_id}}',
            '{{%user_activity}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_activity-user_id}}',
            '{{%user_activity}}'
        );

        $this->dropTable('{{%user_activity}}');
    }
}
