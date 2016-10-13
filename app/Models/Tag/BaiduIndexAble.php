<?php

namespace App\Models\Tag;

use GuzzleHttp;

trait BaiduIndexAble
{
    private static $api_url = 'http://api.91cha.com/';


    private static function getBaiduIndex4API(array $names)
    {
        $client = new GuzzleHttp\Client([
            'base_uri' => self::$api_url,
        ]);

        $query = [
            'key' => env('91CHA_API_KEY'),
            'kws' => implode(',', $names),
        ];

        return json_decode(
            $client
                ->request('GET', 'index', ['query' => $query])
                ->getBody()
                ->getContents()
        );
    }

    /**
     * @param array $ids
     * @throws \Exception
     */
    public static function refreshBaiduIndex(array $ids)
    {
        $ids = self::wrapToIds($ids);

        $tags = self::findMany($ids);

        $res = self::getBaiduIndex4API($tags->pluck('name')->all());

        if (empty($res->data)) {
            throw new \Exception("Failed to load data from: ".self::$api_url.'.');
        }

        foreach ($res->data as $item) {
            $item = (array) $item;
            
            $tag = $tags
                ->first(function ($value) use($item) {
                    return $value->name == $item['keyword'];
                });

            $tag->baidu_index = implode(',', $item);

            $tag->save();
        }
    }
}