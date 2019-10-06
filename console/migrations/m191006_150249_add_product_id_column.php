<?php

use yii\db\Migration;

/**
 * Class m191006_150249_add_product_id_column
 */
class m191006_150249_add_product_id_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('review', 'product_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('review', 'product_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191006_150249_add_product_id_column cannot be reverted.\n";

        return false;
    }
    */
}
