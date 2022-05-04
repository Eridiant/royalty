<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user_ip}}`.
 */
class m220504_202225_add_region_column_to_user_ip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_ip}}', 'region', $this->string(128)->after('country'));
        $this->addColumn('{{%user_ip}}', 'checked', $this->tinyInteger()->after('city'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_ip}}', 'region');
        $this->dropColumn('{{%user_ip}}', 'checked');
    }
}
