<?php

namespace app\services;

use Yii;
namespace app\services;

class OpenLibService
{
    public static function search($title)
    {
        $url = 'https://openlibrary.org/search.json?title=' . urlencode($title);
        $res = @file_get_contents($url);

        if ($res === false) {
            return ['error' => 'Unable to connect to Open Library'];
        }

        return json_decode($res, true);
    }
    public static function searchByKey($key)
    {
        $url = 'https://openlibrary.org/' . urlencode($key) . ".json";
        $res = @file_get_contents($url);

        if ($res === false) {
            return ['error' => 'Unable to connect to Open Library'];
        }

        return json_decode($res, true);
    }
}
