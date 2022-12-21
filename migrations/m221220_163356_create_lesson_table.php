<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 */
class m221220_163356_create_lesson_table extends Migration
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
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
            'title' => $this->string(),
            'description' => $this->text(),
            'link' => $this->string(),
        ], $tableOptions);

        $this->insert('{{%lesson}}', [
            'title' => 'Как я ПЕРЕВЕРНУЛ и разбил BMW?',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis est metus, non tempus orci faucibus in. Aenean condimentum, magna non finibus fermentum, leo diam elementum justo, ac consectetur est nulla eu est. Morbi fermentum nulla ac turpis scelerisque tristique rhoncus congue leo. ',
            'link' => 'https://www.youtube.com/watch?v=op7InodKoa8'
        ]);
        $this->insert('{{%lesson}}', [
            'title' => 'ОТДАЛ 150 ТЫСЯЧ ЗА LUPO',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis est metus, non tempus orci faucibus in. Aenean condimentum, magna non finibus fermentum, leo diam elementum justo, ac consectetur est nulla eu est. Morbi fermentum nulla ac turpis scelerisque tristique rhoncus congue leo. ',
            'link' => 'https://www.youtube.com/watch?v=lk22WGFVZhU'
        ]);
        $this->insert('{{%lesson}}', [
            'title' => 'НЕТ НИЧЕГО ГРОМЧЕ! — ТОПЛЕС',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis est metus, non tempus orci faucibus in. Aenean condimentum, magna non finibus fermentum, leo diam elementum justo, ac consectetur est nulla eu est. Morbi fermentum nulla ac turpis scelerisque tristique rhoncus congue leo. ',
            'link' => 'https://www.youtube.com/watch?v=YhQUnd1bdgo'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lesson}}');
    }
}
