<?php
namespace app\controllers;

use app\models\BookSearch;
use Yii;
use yii\web\Controller;
use yii\helpers\Json;

class BookController extends Controller
{
    public function actionIndex()
    {

        $title=Yii::$app->request->get('title', '') ? Yii::$app->request->get('title') :'/';
        $book = [];


        $url = 'https://openlibrary.org/search.json?title=' . urlencode($title);
        $response = @file_get_contents($url);
        if ($response === false) {
            Yii::$app->session->setFlash('error', 'Unable to retrieve data from Open Library.');
            return $this->render('index', ['books' => []]);
        }
        $data = Json::decode($response, true);
        if (isset($data['docs'])) {
            foreach ($data['docs'] as $item) {
                $coverId = $item['cover_i'] ?? null;
                $book[] = [
                    'title' => $item['title'] ?? 'No title',
                    'author' => isset($item['author_name']) ? implode(', ', $item['author_name']) : 'Unknown',
                    'isbn' => $item['isbn'][0] ?? 'N/A',
                    'publication_date' => $item['publish_date'][0] ?? 'N/A',
                    'language' => isset($item['language']) ? implode(',  ', $item['language']) : ' Unknown',


                    'cover_url' => $coverId ? 'https://covers.openlibrary.org/b/id/' . $coverId . '-L.jpg' : "Unknown",
                ];
            }
        }
    
        return $this->render('index', ['books' => $book , 'title'=> $title]);
    }
}