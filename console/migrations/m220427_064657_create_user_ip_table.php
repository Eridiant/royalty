<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_ip}}`.
 */
class m220427_064657_create_user_ip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_ip}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->integer(10)->unsigned()->notNull(),
            'code' => $this->string(10),
            'country' => $this->string(64),
            'city' => $this->string(64),
            'created_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `ip`
        $this->createIndex(
            '{{%idx-user-ip-ip}}',
            '{{%user_ip}}',
            'ip'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `ip`
        $this->dropIndex(
            '{{%idx-user-ip-ip}}',
            '{{%user_ip}}',
            'ip'
        );

        $this->dropTable('{{%user_ip}}');
    }
}
