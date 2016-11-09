<?php
/**
 * Created by PhpStorm.
 * User: shx
 * Date: 2016/11/4
 * Time: 10:14
 */

namespace App\Helpers;


use Illuminate\Pagination\LengthAwarePaginator;

class Content
{
    const PAGE_FLAG = '<!--[#page#]-->';
    private $content;
    private $page;

    public function __construct($content)
    {
        $this->content = explode(self::PAGE_FLAG, $content);

        $this->page = new LengthAwarePaginator($this->content, count($this->content), 1, null, ['path' => url()->current()]);
    }

    public function __toString()
    {
        return isset($this->content[$this->page->currentPage()-1]) ? (string)$this->content[$this->page->currentPage()-1] : '';
    }

    public function links()
    {
        return $this->page->links();
    }
}