<?php



Route::get('/test', 'TestController@index');

Route::get('/tag/{tag_name}', 'Tag\TagController@index')->name('tag.show');

Route::post('/tag/{tag_name}', 'Tag\TagController@update')->name('tag.update');

Route::bind('tag_name', function ($name) {
    return App\Models\Tag\Tag::where('pinyin', $name)
        ->orWhere('name', $name)
        ->firstOrFail();
});