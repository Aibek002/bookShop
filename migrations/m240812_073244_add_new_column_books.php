<?php

use yii\db\Migration;

/**
 * Class m240812_073244_add_new_column_books
 */
class m240812_073244_add_new_column_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('books', 'price', $this->integer());
        $this->addColumn('books','description', $this->string());
        $this->addColumn('books','publication_date', $this->string());
        $this->addColumn('books','language', $this->string());
        $this->addColumn('books','cover_image', $this->string());
        $this->addColumn('books','stock_quantity', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('books','price');
        $this->dropColumn('books','description');
        $this->dropColumn('books','publication_date');
        $this->dropColumn('books','language');
        $this->dropColumn('books','cover_image');
        $this->dropColumn('books','stock_quantity');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240812_073244_add_new_column_books cannot be reverted.\n";

        return false;
    }
    */
}
