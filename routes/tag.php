<?php



Route::get('/test', 'TestController@index');
Route::group(['prefix'=>'member','middleware'=>'loginAuth'],function(){

    Route::get('/userAddIndex', function () {
        return view('archive.userAddIndex');
    })->name('userAddIndex');

    Route::get('/userArchivesList','Archive\ArchiveController@userArchivesList' )->name('userArchivesList');

    Route::get('/tag/index', 'Tag\TagController@index')->name('tag.index');

    Route::get('/tag/{tag_name}/edit', 'Tag\TagController@edit')->name('tag.edit');
    Route::get('/tag/{tag_name}/status/{code}', 'Tag\TagController@status')->name('tag.status');

    Route::post('/tag/{tag_name}/update', 'Tag\TagController@update')->name('tag.update');

    Route::post('/tag/{tag_name}/attribute', 'Tag\TagController@attrUpdate')->name('tag.attribute.update');
    Route::delete('/tag/attribute/{attr_id}', 'Tag\TagController@attrDelete')->name('tag.attribute.delete');
    Route::post('/tag/extract', 'Tag\TagController@extractTags')->name('tag.extract');

    Route::bind('tag_name', function ($name) {
        return App\Models\Tag\Tag::where('pinyin', $name)
            ->orWhere('name', $name)
            ->firstOrFail();
    });

    Route::bind('attr_id', function ($id) {
        return App\Models\Tag\TagAttribute::find($id);
    });

    Route::resource('archives', 'Archive\ArchiveController');
    Route::post('archives/upload', 'Archive\ArchiveController@upload')->name('archives.upload');
    Route::get('archives/create/{archive_type}', 'Archive\ArchiveController@create')->name('archives.create');
    Route::post('archives/{archive_type}', 'Archive\ArchiveController@store')->name('archives.store');
    Route::get('archives/{archive}/toggle/{name}', 'Archive\ArchiveController@toggle')->name('archives.toggle');

    Route::bind('archive_type', function ($type_name) {
        if ($type_name) {
            return App\Models\Archive\ArchiveType
                ::where("name", $type_name)
                ->firstOrFail();
        } else {
            return App\Models\Archive\ArchiveType::find(1);
        }
    });
});

Route::get('/image/{uri}/{size}', function ($uri, $size) {
    $img = Image::make(asset($uri));
    $size = explode('x', $size);
    if(!isset($size[1])) $size[1] = $size[0];
    $img->fit($size[0], $size[1]);
    return $img->response('png');
})->name('image')->where(['uri' => '.+']);