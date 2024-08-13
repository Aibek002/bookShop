<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;

class BookController extends Controller
{
    public function actionIndex($title = "hello")
    {
        $url = 'https://openlibrary.org/search.json?title=' . urlencode($title);
        $response = @file_get_contents($url);

        if ($response === false) {
            Yii::$app->session->setFlash('error', 'Unable to retrieve data from Open Library.');
            return $this->render('index', ['books' => []]);
        }

        $data = Json::decode($response, true);
        $books = [];

        if (isset($data['docs'])) {
            foreach ($data['docs'] as $item) {
                $coverId = isset($item['cover_i']) ? $item['cover_i'] : null;
                $books[] = [
                    'title' => $item['title'],
                    'author' => isset($item['author_name']) ? implode(', ', $item['author_name']) : 'Unknown',
                    'isbn' => isset($item['isbn'][0]) ? $item['isbn'][0] : 'N/A',
                    'publication_date' => isset($item['publish_date'][0]) ? $item['publish_date'][0] : 'N/A',
                    'language' => isset($item['language']) ? implode(', ', $item['language']) : 'Unknown',
                    'language' => isset($item['language']) ? implode(', ', $item['language']) : 'Unknown',
                    'cover_url' => $coverId ? 'https://covers.openlibrary.org/b/id/' . $coverId . '-L.jpg' : null,
                ];
            }
        }

        return $this->render('index', ['books' => $books]);
    }
}
