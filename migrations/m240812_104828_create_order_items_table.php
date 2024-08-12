<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_items}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%books}}`
 */
class m240812_104828_create_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_items}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'price' => $this->string(),
            'quantity' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-order_items-user_id}}',
            '{{%order_items}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-order_items-user_id}}',
            '{{%order_items}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-order_items-book_id}}',
            '{{%order_items}}',
            'book_id'
        );

        // add foreign key for table `{{%books}}`
        $this->addForeignKey(
            '{{%fk-order_items-book_id}}',
            '{{%order_items}}',
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
            '{{%fk-order_items-user_id}}',
            '{{%order_items}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-order_items-user_id}}',
            '{{%order_items}}'
        );

        // drops foreign key for table `{{%books}}`
        $this->dropForeignKey(
            '{{%fk-order_items-book_id}}',
            '{{%order_items}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-order_items-book_id}}',
            '{{%order_items}}'
        );

        $this->dropTable('{{%order_items}}');
    }
}
