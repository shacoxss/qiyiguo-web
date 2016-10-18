<?php

namespace App\Http\Controllers;

use App\Models\Tag\Tag;
use App\Models\Tag\TagFinder;
use App\Models\Tag\Relation;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        //dd(1);
        $t=microtime(true);
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $result = socket_connect($socket, '127.0.0.1', 10000);
        $cut = "从socket中获取的数据将被保存在由 buf 制定的变量中。 如果有错误发生，如链接被重置，数据不可用等等， buf 将被设为 NULL。 \n";
        socket_write($socket, $cut, strlen($cut));
        $out = socket_read($socket, 2048);
        echo $out.'<br>';
        echo microtime(true) - $t;
        socket_write($socket, "quit\n", strlen("quit\n"));
        $out = socket_read($socket, 2048);
        socket_close($socket);

    }

    public function tag(Request $request,Tag $tag)
    {
        dd($tag);
    }
}
