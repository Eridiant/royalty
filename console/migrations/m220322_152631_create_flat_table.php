<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%flat}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%floor}}`
 */
class m220322_152631_create_flat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%flat}}', [
            'id' => $this->primaryKey(),
            'floor_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `floor_id`
        $this->createIndex(
            '{{%idx-flat-floor_id}}',
            '{{%flat}}',
            'floor_id'
        );

        // add foreign key for table `{{%floor}}`
        $this->addForeignKey(
            '{{%fk-flat-floor_id}}',
            '{{%flat}}',
            'floor_id',
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
            '{{%fk-flat-floor_id}}',
            '{{%flat}}'
        );

        // drops index for column `floor_id`
        $this->dropIndex(
            '{{%idx-flat-floor_id}}',
            '{{%flat}}'
        );

        $this->dropTable('{{%flat}}');
    }
}
