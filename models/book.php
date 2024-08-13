<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'books';
    }

    public function rules()
    {
        return [
            [['title', 'author', 'genre', 'isbn', 'publication_date'], 'safe'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['author', 'genre'], 'string', 'max' => 100],
            [['language'], 'string', 'max' => 100],

        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'author' => 'Author',
            'genre' => 'Genre',
            'isbn' => 'ISBN',
            'publication_date' => 'Publication Date',
            'price' => 'Price',
            'language=>'=> 'Language',
        ];
    }
}
