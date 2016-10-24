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

//home
Route::group(['namespace'=>'Home'],function(){
    Route::get('contentLists','contentController@contentLists')->name('archive.index');
    Route::get('archive/{archive}','contentController@detail')->name('archive.show');
});




Route::post('uploadHeadImg','uploadController@uploadHeadImg');
Route::post('uploadWebLogo','uploadController@uploadWebLogo');

Route::post('uploadHeadImg','uploadController@uploadHeadImg');
Route::post('uploadWebLogo','uploadController@uploadWebLogo');
Route::post('uploadBackground','uploadController@uploadBackground');
Route::post('more','uploadController@more');


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
    Route::any('bindingPhone','RegisterController@binding');
});
Route::group(['prefix'=>'register','namespace'=>'Auth'],function(){
    Route::any('/','RegisterController@reg');
    Route::get('startCaptcha/{time}','RegisterController@startCaptcha');
    Route::post('verifyLogin','RegisterController@verifyLogin');
    Route::post('checkPhone','RegisterController@checkPhone');
    Route::get('success','RegisterController@regSuccess');
    Route::any('bindingPhone','RegisterController@binding');
});
Route::group(['prefix'=>'forget','namespace'=>'Auth'],function(){
    Route::any('/','ForgotPasswordController@forget');
    Route::get('startCaptcha/{time}','ForgotPasswordController@startCaptcha');
    Route::post('verifyLogin','ForgotPasswordController@verifyLogin');
    Route::post('checkPhone','ForgotPasswordController@checkPhone');
    Route::any('setPassword','ForgotPasswordController@setPassword');
    Route::get('success','ForgotPasswordController@resetSuccess');
});
Route::group(['prefix'=>'member','namespace'=>'Member','middleware'=>'loginAuth'],function(){
    Route::get('index','indexController@userIndex');
    Route::post('sign','indexController@sign');
    Route::get('masterIndex','indexController@masterIndex')->middleware('masterAuth');
    Route::get('userProfile','userProfileController@index');
    Route::get('userFollow','userFollowController@index');
    Route::get('userFans','userFansController@index');
    Route::get('userCollect','userCollectController@index');
    Route::post('saveHeadImg','userProfileController@saveHeadImg');
    Route::post('resetPassword','userProfileController@resetPassword');
    Route::post('resetNickname','userProfileController@resetNickname');
    Route::post('resetPhone','userProfileController@resetPhone');
    Route::post('bindingPhone','userProfileController@bindingPhone');
    Route::post('resetIntro','userProfileController@resetIntro');
    Route::resource('userManage','userManageController');
    Route::post('saveNickname','userManageController@saveNickname')->middleware('userManageAuth');
    Route::post('savePhonePassword','userManageController@savePhonePassword')->middleware('userManageAuth');
    Route::post('saveAuth','userManageController@saveAuth')->middleware('userManageAuth');
    Route::get('masterPowers','powersController@index')->middleware('powersAuth');
    Route::post('addMaster','powersController@addMaster')->middleware('powersAuth');
    Route::post('masterPowerEdit','powersController@masterPowerEdit')->middleware('powersAuth');
    Route::post('delMaster','powersController@delMaster')->middleware('powersAuth');
    Route::get('masterGlobal','masterGlobalController@index')->middleware('globalAuth');
    Route::post('masterGlobal','masterGlobalController@index')->middleware('globalAuth');
    Route::get('masterCategory','categoryController@index')->middleware('catAuth');
    Route::post('masterCategory','categoryController@store')->middleware('catAuth');
    Route::get('masterCategoryAdd','categoryController@create')->middleware('catAuth');
    Route::get('masterCategoryDel/{id}','categoryController@delete')->middleware('catAuth');
    Route::get('masterCategory/{id}','categoryController@edit')->middleware('catAuth');
    Route::post('masterCategory/{id}','categoryController@update')->middleware('catAuth');

});
Route::get('noAuth',function(){
   return view('member.noAuth');
});


require dirname(__FILE__).'/tag.php';