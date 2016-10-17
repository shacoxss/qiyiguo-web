<?php



Route::get('/test', 'TestController@index');

Route::get('/tag/{tag_name}', 'Tag\TagController@index')->name('tag.show');

Route::post('/tag/{tag_name}', 'Tag\TagController@update')->name('tag.update');

Route::post('/tag/{tag_name}/attribute', 'Tag\TagController@attrUpdate')->name('tag.attribute.update');
Route::delete('/tag/attribute/{attr_id}', 'Tag\TagController@attrDelete')->name('tag.attribute.delete');

Route::bind('tag_name', function ($name) {
    return App\Models\Tag\Tag::where('pinyin', $name)
        ->orWhere('name', $name)
        ->firstOrFail();
});

Route::bind('attr_id', function ($id) {
    return App\Models\Tag\TagAttribute::find($id);
});