<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shopping_cart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%books}}`
 */
class m240812_104412_create_shopping_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shopping_cart}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'quantity' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-shopping_cart-user_id}}',
            '{{%shopping_cart}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-shopping_cart-user_id}}',
            '{{%shopping_cart}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-shopping_cart-book_id}}',
            '{{%shopping_cart}}',
            'book_id'
        );

        // add foreign key for table `{{%books}}`
        $this->addForeignKey(
            '{{%fk-shopping_cart-book_id}}',
            '{{%shopping_cart}}',
            'book_id',
            '{{%books}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-shopping_cart-user_id}}',
            '{{%shopping_cart}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-shopping_cart-user_id}}',
            '{{%shopping_cart}}'
        );

        // drops foreign key for table `{{%books}}`
        $this->dropForeignKey(
            '{{%fk-shopping_cart-book_id}}',
            '{{%shopping_cart}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-shopping_cart-book_id}}',
            '{{%shopping_cart}}'
        );

        $this->dropTable('{{%shopping_cart}}');
    }
}
