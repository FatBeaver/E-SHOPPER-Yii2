<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%new_user}}`.
 */
class m191001_212447_create_new_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {   
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' =>$this->string(255)->notNull(),
            'password' =>$this->string(255)->notNull(),
            'auth_key' =>$this->string(255),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('user');

    }
}
