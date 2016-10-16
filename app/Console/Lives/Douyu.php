<?php

namespace App\Console\Lives;

class Douyu extends \Threaded
{
    const BASE_URL = 'http://open.douyucdn.cn/api/RoomApi/live';
    private $offset = 0;
    private $done = false;
    public function __construct()
    {
    }
    public function nextUrl() : string
    {
        if($this->done) {
            return '';
        } else {
            $offset = $this->offset * 100;
            $this->offset++;
            return self::BASE_URL."?offset={$offset}&limit=100";
        }
    }
    public function dataFormat(stdClass $data) : array
    {
        $r = [];
        foreach($data as $i) {
            $i = (array)$i;
            $t['name'] = $i['nickname'];
            $t['room_name'] = $i['room_name'];
            $t['online'] = $i['online'];
            $t['live_user_id'] = 'd_'.$i['owner_uid'];
            $t['live_id'] = 1;
            $t['url'] = $i['url'];
            $t['cover'] = $i['room_src'];
            $t['avatar'] = $i['avatar'];
            $t['live_category_id'] = 'd_'.$i['cate_id'];
            $t['category_name'] = $i['game_name'];
            $t['category_url'] = $i['game_url'];
            $r[] = $t;
        }
        if(empty($r)) $this->done = true;
        return $r;
    }
}