<?php

namespace App\Models\Tag;

use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\JiebaAnalyse;


class TagFinder
{
    public static function extractTags($content, $top_k = 20)
    {
        ini_set('memory_limit', '-1');
        Jieba::init();
        Finalseg::init();
        JiebaAnalyse::init();

        return JiebaAnalyse::extractTags($content, $top_k);
    }

}