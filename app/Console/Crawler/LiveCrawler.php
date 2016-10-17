<?php

namespace App\Console\Crawler;

class LiveCrawler extends \Worker
{
    // protected $live;

    // public function __construct($live)
    // {
    //     $this->live = $live;
    // }

    public function run ()
    {
        while($url = $this->live->nextUrl()) {

            // $data = file_get_contents($url);
            
            // $data = (array) json_decode($data)->data;
            // echo $this->getThreadId().$url.PHP_EOL;
            // $data = $this->live->dataFormat($data);

            // // live_category
            // $sql_c = "insert into live_categories (name, live_category_id, live_id, url) values ";

            
            // // anchor
            // $sql = "insert into anchors (name, room_name, online,
            //     live_user_id, live_id, url, cover, avatar,
            //     live_category_id, status) values ";
            // foreach($data as $t) {
            //     $sql_c .= "('$t[category_name]', '$t[live_category_id]', $t[live_id], '$t[category_url]'),";
            //     $sql .= "($t[name]', '$t[room_name]', $t[online], 
            //         '$t[live_user_id]', $t[live_id], '$t[url]', '$t[cover]', '$t[avatar]',
            //         $t[live_category_id], 1),";
            // }
            // $sql_c = substr($sql_c, 0, -1);
            // $sql = substr($sql, 0, -1);
            // //\DB::insert($sql_c);
            // //\DB::insert($sql);
        };
    }
}
