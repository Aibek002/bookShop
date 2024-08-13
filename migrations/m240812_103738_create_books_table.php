<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%authors}}`
 * - `{{%genres}}`
 * - `{{%publishers}}`
 */
class m240812_103738_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'authors_id' => $this->integer()->notNull(),
            'genre_id' => $this->integer()->notNull(),
            'publisher_id' => $this->integer()->notNull(),
            'isbn' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'description' => $this->text(),
            'published_date' => $this->string(),
            'language' => $this->string(),
            'cover_image' => $this->text(),
            'stock_quanlitity' => $this->integer(),
        ]);

        // creates index for column `authors_id`
        $this->createIndex(
            '{{%idx-books-authors_id}}',
            '{{%books}}',
            'authors_id'
        );

        // add foreign key for table `{{%authors}}`
        $this->addForeignKey(
            '{{%fk-books-authors_id}}',
            '{{%books}}',
            'authors_id',
            '{{%authors}}',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            '{{%idx-books-genre_id}}',
            '{{%books}}',
            'genre_id'
        );

        // add foreign key for table `{{%genres}}`
        $this->addForeignKey(
            '{{%fk-books-genre_id}}',
            '{{%books}}',
            'genre_id',
            '{{%genres}}',
            'id',
            'CASCADE'
        );

        // creates index for column `publisher_id`
        $this->createIndex(
            '{{%idx-books-publisher_id}}',
            '{{%books}}',
            'publisher_id'
        );

        // add foreign key for table `{{%publishers}}`
        $this->addForeignKey(
            '{{%fk-books-publisher_id}}',
            '{{%books}}',
            'publisher_id',
            '{{%publishers}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%authors}}`
        $this->dropForeignKey(
            '{{%fk-books-authors_id}}',
            '{{%books}}'
        );

        // drops index for column `authors_id`
        $this->dropIndex(
            '{{%idx-books-authors_id}}',
            '{{%books}}'
        );

        // drops foreign key for table `{{%genres}}`
        $this->dropForeignKey(
            '{{%fk-books-genre_id}}',
            '{{%books}}'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            '{{%idx-books-genre_id}}',
            '{{%books}}'
        );

        // drops foreign key for table `{{%publishers}}`
        $this->dropForeignKey(
            '{{%fk-books-publisher_id}}',
            '{{%books}}'
        );

        // drops index for column `publisher_id`
        $this->dropIndex(
            '{{%idx-books-publisher_id}}',
            '{{%books}}'
        );

        $this->dropTable('{{%books}}');
    }
}
