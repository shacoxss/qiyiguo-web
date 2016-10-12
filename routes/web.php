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


Route::group(['prefix'=>'auth','namespace'=>'Auth'],function(){
    Route::any('/','loginController@login');
    Route::any('loginMobile','loginController@loginMobile');
    Route::get('startCaptcha/{time}','loginController@startCaptcha');
    Route::post('verifyLogin','loginController@verifyLogin');
    Route::get('logout','loginController@logout');
    Route::get('forget','loginController@forgetPassword');
    Route::get('success','loginController@loginSuccess');

    Route::get('weixinWeb', 'loginController@weixinWeb');
    Route::get('weixinWebCallback', 'loginController@weixinWebCallback');

    Route::get('qq', 'loginController@qq');
    Route::get('qqCallback', 'loginController@qqCallback');

    Route::get('weibo', 'loginController@weibo');
    Route::get('weiboCallback', 'loginController@weiboCallback');
});
Route::group(['prefix'=>'register','namespace'=>'Auth'],function(){
    Route::any('/','RegisterController@reg');
    Route::get('startCaptcha/{time}','RegisterController@startCaptcha');
    Route::post('verifyLogin','RegisterController@verifyLogin');
    Route::post('checkPhone','RegisterController@checkPhone');
    Route::get('success','RegisterController@regSuccess');
});
Route::group(['prefix'=>'forget','namespace'=>'Auth'],function(){
    Route::any('/','ForgotPasswordController@forget');
    Route::get('startCaptcha/{time}','ForgotPasswordController@startCaptcha');
    Route::post('verifyLogin','ForgotPasswordController@verifyLogin');
    Route::post('checkPhone','ForgotPasswordController@checkPhone');
    Route::any('setPassword','ForgotPasswordController@setPassword');
    Route::get('success','ForgotPasswordController@resetSuccess');
});
Route::group(['prefix'=>'member','namespace'=>'Member'],function(){
    Route::get('index','indexController@userIndex');
    Route::get('masterIndex','indexController@masterIndex');
});



Route::get('/test', 'TestController@index');

Route::get('/tag/{tag_name}', 'TestController@tag')->name('tag.show');

Route::bind('tag_name', function ($name) {
    return \App\Models\Tag::where('pinyin', $name)
        ->orWhere('name', $name)
        ->firstOrFail();
});

