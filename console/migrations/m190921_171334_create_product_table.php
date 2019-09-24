<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m190921_171334_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(10)->notNull(),
            'name' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'price' => $this->float()->notNull(),
            'keywords' => $this->string(255),
            'description' => $this->string(255),
            'img' => $this->string(255)->defaultValue('no_image.png'),
            'hit' => $this->integer(2)->notNull(),
            'new' => $this->integer(2)->notNull(),
            'sale' => $this->integer(2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
