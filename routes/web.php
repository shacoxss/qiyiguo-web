<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', 'TestController@index');

Route::get('/tag/{tag_name}', 'TestController@tag')->name('tag.show');

Route::bind('tag_name', function ($name) {
    return \App\Models\Tag::where('pinyin', $name)
        ->orWhere('name', $name)
        ->firstOrFail();
});