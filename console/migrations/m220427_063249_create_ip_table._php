<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ip}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%floor}}`
 */
class m220427_063249_create_ip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ip}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->integer(),
        ]);

        // creates index for column `ip`
        $this->createIndex(
            '{{%idx-ip-ip}}',
            '{{%ip}}',
            'ip'
        );

        // add foreign key for table `{{%floor}}`
        $this->addForeignKey(
            '{{%fk-ip-ip}}',
            '{{%ip}}',
            'ip',
            '{{%floor}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%floor}}`
        $this->dropForeignKey(
            '{{%fk-ip-ip}}',
            '{{%ip}}'
        );

        // drops index for column `ip`
        $this->dropIndex(
            '{{%idx-ip-ip}}',
            '{{%ip}}'
        );

        $this->dropTable('{{%ip}}');
    }
}
