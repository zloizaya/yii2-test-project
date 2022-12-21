<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%viewed}}`.
 */
class m221221_114223_create_viewed_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%viewed}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(),
            'lid' => $this->integer(),
         ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%viewed}}');
    }
}
