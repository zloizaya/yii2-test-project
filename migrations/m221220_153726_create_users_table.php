<?php

use yii\db\Migration;
use app\modules\users\models\User;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221220_153726_create_users_table extends Migration
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

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->date()->notNull(),
            'updated_at' => $this->date()->notNull(),
            'username' => $this->string()->notNull(),
            'full_name' => $this->string(),
            'auth_key' => $this->string(32),
            'email_confirm_token' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('idx-user-username', '{{%user}}', 'username', true);
        $this->createIndex('idx-user-email', '{{%user}}', 'email', true);

        $model = new User();
        $model->username = "admin";
        $model->email = "admin@diontech.loc";
        $model->setPassword('asd123');
        $model->generateAuthKey();
        $model->save();

        $model = new User();
        $model->username = "student1";
        $model->email = "student1@diontech.loc";
        $model->setPassword('asd123');
        $model->generateAuthKey();
        $model->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
