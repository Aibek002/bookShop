<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wishlists}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%books}}`
 */
class m240812_104039_create_wishlists_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wishlists}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-wishlists-user_id}}',
            '{{%wishlists}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-wishlists-user_id}}',
            '{{%wishlists}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-wishlists-book_id}}',
            '{{%wishlists}}',
            'book_id'
        );

        // add foreign key for table `{{%books}}`
        $this->addForeignKey(
            '{{%fk-wishlists-book_id}}',
            '{{%wishlists}}',
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
            '{{%fk-wishlists-user_id}}',
            '{{%wishlists}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-wishlists-user_id}}',
            '{{%wishlists}}'
        );

        // drops foreign key for table `{{%books}}`
        $this->dropForeignKey(
            '{{%fk-wishlists-book_id}}',
            '{{%wishlists}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-wishlists-book_id}}',
            '{{%wishlists}}'
        );

        $this->dropTable('{{%wishlists}}');
    }
}
