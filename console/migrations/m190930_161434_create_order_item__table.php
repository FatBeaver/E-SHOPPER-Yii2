<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item_}}`.
 */
class m190930_161434_create_order_item__table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_item', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(10)->notNull(),
            'product_id' => $this->integer(10)->notNull(),
            'name' => $this->string(255)->notNull(),
            'price' => $this->float()->notNull(),
            'qty_item' => $this->string(10)->notNull(),
            'sum_item' => $this->float()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order_item');
    }
}
