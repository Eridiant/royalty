<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%floor}}`.
 */
class m220322_151307_create_floor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%floor}}', [
            'id' => $this->primaryKey(),
            'floor' => $this->tinyInteger()->notNull()->unique(),
            'price' => $this->smallInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%floor}}');
    }
}
