<?php
/**
 * Created by PhpStorm.
 * User: shx
 * Date: 2016/11/4
 * Time: 10:14
 */

namespace App\Helpers;


class Content
{
    const PAGE_FLAG = '<!--[#page#]-->';
    private $content;
    private $page = 0;

    public function __construct($content)
    {
        $this->content = explode(self::PAGE_FLAG, $content);
        $page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;

        $this->page = is_integer($page) && $page > 0 ? $page : 1;
    }

    public function __toString()
    {
        return isset($this->content[$this->page]) ? (string)$this->content[$this->page-1] : '';
    }
}