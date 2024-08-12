<?php

use yii\db\Migration;

/**
 * Class m240812_074107_alter_column_books
 */
class m240812_074107_alter_column_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn("books","description", $this->text());
        $this->alterColumn("books","cover_image", $this->text());
        $this->alterColumn("books","author_id", $this->integer());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn("books","description", $this->string());
        $this->alterColumn("books","cover_image", $this->string());
        $this->alterColumn("books","author_id", $this->string());


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240812_074107_alter_column_books cannot be reverted.\n";

        return false;
    }
    */
}
