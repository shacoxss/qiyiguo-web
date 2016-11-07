<?php
/**
 * Created by PhpStorm.
 * User: shx
 * Date: 2016/11/4
 * Time: 10:14
 */

namespace App\Helpers;


class ContentCut
{
    public $content;
    const MIN_LEN = 5000;
    private $end_word = '/^.+?<\/p>|<\/div>/ims';

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function cut($page = 1)
    {
        $result = [];
        $this->content = preg_match_all('#<([a-z0-9]+)[^>]*>([^<>]|(?R))*</\\1>#is', $this->content, $result);
        return $result;
    }

    private function getOffset($page)
    {
        if ($page == 1) return 0;
        return 1;
    }
}