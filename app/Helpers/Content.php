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
    public $content;
    const MIN_LEN = 5000;
    const PAGE_FLAG = '<!--page-->';

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function cut($page = 1)
    {
        preg_match_all('#<([a-z1-6]+)[^>]*>(?:[^<>]|(?R))*(?:</\\1>)?#isu', $this->content, $temp);

        $sections = preg_replace('#<[^>]+>#', '', $temp[0]);
        $html = '';
        $count = 0;

        foreach ($sections as $index => $sec) {
            $count += strlen($sec);
            $html .= $temp[0][$index];
            if ($count > self::MIN_LEN /*&& !preg_match('#^<h#', $temp[0][$index])*/) {
                $count = 0;
                $html .= self::PAGE_FLAG;
            }
        }

        return $html;
    }
}