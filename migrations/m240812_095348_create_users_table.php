<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m240812_095348_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
         
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
