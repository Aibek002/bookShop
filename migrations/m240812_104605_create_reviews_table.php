<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reviews}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%books}}`
 */
class m240812_104605_create_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'rating' => $this->integer(),
            'comment' => $this->text(),
            'created_at' => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-reviews-user_id}}',
            '{{%reviews}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-reviews-user_id}}',
            '{{%reviews}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-reviews-book_id}}',
            '{{%reviews}}',
            'book_id'
        );

        // add foreign key for table `{{%books}}`
        $this->addForeignKey(
            '{{%fk-reviews-book_id}}',
            '{{%reviews}}',
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
            '{{%fk-reviews-user_id}}',
            '{{%reviews}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-reviews-user_id}}',
            '{{%reviews}}'
        );

        // drops foreign key for table `{{%books}}`
        $this->dropForeignKey(
            '{{%fk-reviews-book_id}}',
            '{{%reviews}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-reviews-book_id}}',
            '{{%reviews}}'
        );

        $this->dropTable('{{%reviews}}');
    }
}
