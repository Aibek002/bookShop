<?php
namespace app\models;
use Yii;
use yii\base\Model;

class BookSearch extends Model{
    public $title;

    public function rules(){
        return [
            [["title"],"required"],
            [["title"],"string"],
            [["title"],"string","min"=> 2],
        ] ;
    }
}