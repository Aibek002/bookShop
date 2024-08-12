<?php

use yii\db\Migration;

/**
 * Class m240812_073053_add_new_column_news
 */
class m240812_073053_add_new_column_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("news", "name", $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn("news","name");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240812_073053_add_new_column_news cannot be reverted.\n";

        return false;
    }
    */
}
