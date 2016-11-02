<?php


Route::get('/test', 'TestController@index');
Route::get('/any', 'TestController@anyData');
Route::group(['prefix'=>'member','middleware'=>'loginAuth'],function(){

    Route::get('/userAddIndex', function () {
        return view('archive.userAddIndex');
    })->name('userAddIndex');


    Route::get('/tags', 'Tag\TagController@index')->name('tag.index');
    Route::get('/tag/create', 'Tag\TagController@create')->name('tag.create');
    Route::post('/tag/store', 'Tag\TagController@store')->name('tag.store');
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

    Route::get('archives/{left?}', 'Archive\ArchiveController@index')->name('archives.index');
    //Route::resource('archives', 'Archive\ArchiveController');
    Route::post('archives/upload', 'Archive\ArchiveController@upload')->name('archives.upload');
    Route::get('archives/create/{archive_type}', 'Archive\ArchiveController@create')->name('archives.create');
    Route::post('archives/{archive_type}', 'Archive\ArchiveController@store')->name('archives.store');
    Route::put('archives/{archive}', 'Archive\ArchiveController@update')->name('archives.update');
    Route::get('archives/{archive}/toggle/{name}', 'Archive\ArchiveController@toggle')->name('archives.toggle');
    Route::get('archives/destroy/{archive}', 'Archive\ArchiveController@destroy')->name('archives.destroy');
    Route::get('archives/{archive}/{user_type}/edit', 'Archive\ArchiveController@edit')->name('archives.edit');
    Route::get('/plupload', function (){
        return view('archive.plupload');
    })->name('archives.plupload');

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


Route::get('/tag/{tag}', 'TagHeadController@index')->name('tag.list');

Route::bind('tag', function ($name) {
    $tag = App\Models\Tag\Tag::where('pinyin', $name)->first();
    return $tag ? $tag : App\Models\Tag\Tag::where('abbr', $name)->firstOrFail();
});

Route::get('/archive/like/{archive}', 'Home\contentController@like')->name('archive.like');

Route::get('/galleries', 'Home\GalleryController@index')->name('galleries.index');
Route::get('/gallery/{archive}', 'Home\GalleryController@show')->name('galleries.show');

Route::get('/author/{user}', 'Home\IndexController@author')->name('author.index');


Route::get('/{uri}/{size}.jpeg', '\App\Helpers\UploadFile@read')->name('image')->where(['uri' => '.+']);
Route::get('/{defined}', function (\Illuminate\Http\Request $request, $url) {

    $tag = \App\Models\Tag\Tag::where('current_url', '/'.$request->path())->first();
    return $tag ? (new \App\Http\Controllers\TagHeadController)->index($tag) : abort(404, 'Not Found');
})->where(['defined' => '.+']);