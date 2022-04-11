<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lg_source_message}}`.
 */
class m220410_182000_create_lg_source_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lg_source_message}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(24),
            'message' => $this->text(),
        ]);
        $this->createIndex(
            'idx-lg_source_message-category',
            '{{%lg_source_message}}',
            'category'
        );
        $this->addForeignKey(
            'fk_source_message-message',
            '{{%lg_message}}',
            'id',
            '{{%lg_source_message}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // $this->dropForeignKey(
        //     'fk_source_message-message',
        //     '{{%lg_message}}',
        // );
        $this->dropTable('{{%lg_source_message}}');
    }
}
