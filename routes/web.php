<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix'=>'contact','middleware'=>'auth'],function(){
//     Route::get('index','ContactFormController@index');
//     // Route::get('create','ContactFormController@create')->name('welcome');
// });
Auth::routes();
Route::group(['prefix'=>'search','middleware'=>'auth'],function(){
    Route::get('singer', 'SingerController@index')->name('search.singer');
    Route::get('singershow/{id}', 'SingerController@show')->name('search.singershow');

    Route::get('lyricist', 'LyricistController@index')->name('search.lyricist');
    Route::get('lyricistshow/{id}', 'LyricistController@show')->name('search.lyricistshow');

    Route::get('composer', 'ComposerController@index')->name('search.composer');
    Route::get('composershow/{id}', 'ComposerController@show')->name('search.composershow');

});

Route::group(['prefix'=>'contact','middleware'=>'auth'],function(){
    Route::get('myprofile/{id}', 'ContactFormController@index')->name('contact.myprofile');
    Route::get('postimage', 'ContactFormController@create')->name('contact.postimage');
    Route::post('store', 'ContactFormController@store')->name('contact.store');

    Route::get('profilechat/{id}', 'ContactFormController@show')->name('contact.profilechat');

    

});

Route::get('contact/index', 'ShowTopController@index')->name('contact.index');
Route::get('contact/send/{id}', 'ContactFormController@edit')->name('contact.send');
Route::post('/save/{recieve}', 'ContactFormController@save')->name('save');

Route::get('donemail', 'ShowTopController@create')->name('donemail');




Route::get('chat/{recieve}', 'ChatController@index')->name('chat');
Route::post('/add/{recieve}', 'ChatController@add')->name('add');

Route::get('/home', 'HomeController@index')->name('home');
