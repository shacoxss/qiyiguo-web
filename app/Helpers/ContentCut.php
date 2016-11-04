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
        $this->content = preg_replace('#<table>.*(<p>(.*)</p>)</table>#ims', '', $this->content);
        return preg_replace('#.{'.self::MIN_LEN.',}?(</table>|</p>)#ims', '$0<h1 style="color:red">[--page--]</h1>', $this->content);
    }

    private function getOffset($page)
    {
        if ($page == 1) return 0;
        return 1;
    }
}