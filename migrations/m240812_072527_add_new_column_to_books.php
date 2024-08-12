<?php

use yii\db\Migration;

/**
 * Class m240812_072527_add_new_column_to_books
 */
class m240812_072527_add_new_column_to_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("books","genre_id", $this->integer());
        $this->addColumn("books","publisher_id", $this->integer());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240812_072527_add_new_column_to_books cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240812_072527_add_new_column_to_books cannot be reverted.\n";

        return false;
    }
    */
}
