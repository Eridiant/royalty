<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ip_statistics}}`.
 */
class m220426_210823_create_ip_statistics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ip_statistics}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->integer(10)->unsigned()->notNull(),
            'code' => $this->string(10),
            'cantry' => $this->string(24),
            'created_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `ip`
        $this->createIndex(
            '{{%idx-ip-statistics-ip}}',
            '{{%ip_statistics}}',
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
            '{{%idx-ip-statistics-ip}}',
            '{{%ip-statistics}}',
            'ip'
        );

        $this->dropTable('{{%ip_statistics}}');
    }
}
