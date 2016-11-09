<?php
/**
 * Created by PhpStorm.
 * User: shx
 * Date: 2016/11/4
 * Time: 10:14
 */

namespace App\Helpers;


class HTML
{
    public $content;
    const MIN_LEN = 5000;
    const PAGE_FLAG = '<!--[#page#]-->';

    public static function filter($content, $actions = ['clean', 'page'])
    {
        foreach ($actions as $action) {
            $content = self::$action($content);
        }
        return $content;
    }

    private static function page($content)
    {
        preg_match_all('#<([a-z1-6]+)[^>]*>(?:[^<>]|(?R))*(?:</\\1>)?#isu', $content, $temp);

        $sections = preg_replace('#<[^>]+>#', '', $temp[0]);
        $content = '';
        $count = 0;

        foreach ($sections as $index => $sec) {
            $count += strlen($sec);
            $content .= $temp[0][$index];
            if ($count > self::MIN_LEN /*&& !preg_match('#^<h#', $temp[0][$index])*/) {
                $count = 0;
                $content .= self::PAGE_FLAG;
            }
        }

        return $content;
    }

    private static function clean($content)
    {
        return clean($content);
    }
}