<?php

namespace App\Console\Lives;

interface LiveInterface
{
    public function nextUrl() : string;
    public function dataFormat(stdClass $data) : array;
}