<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190921_171314_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->notNull()->defaultValue(0),
            'name' => $this->string(255)->notNull(),
            'keywords' => $this->string(255),
            'description' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
