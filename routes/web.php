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

    // Route::post('contact/store', 'ContactFormController@store')->name('contact.store');
    // Route::get('comments/chat', 'ChatController@index')->name('comments.chat');
    // Route::post('comments/store', 'ChatController@store')->name('comment.store');
});

Route::group(['prefix'=>'contact','middleware'=>'auth'],function(){
    Route::get('myprofile/{id}', 'ContactFormController@edit')->name('contact.myprofile');
    Route::get('postimage', 'ContactFormController@create')->name('contact.postimage');
    Route::post('store', 'ContactFormController@store')->name('contact.store');

    
    
});


Route::get('contact/index', 'ShowTopController@index')->name('contact.index');

Route::get('chat1', 'ChatController@index')->name('chat1');
Route::post('/add', 'ChatController@add')->name('add');
Route::get('home1', 'ContactController@index')->name('home1');


// Route::post('/add', 'ChatController@add')->name('add');
// Route::get('/result/ajax', 'ChatController@getData');


// Route::get('contact/singer', 'ContactFormController@index')->name('contact.singer');
// Route::get('contact/singershow/{id}', 'ContactFormController@show')->name('contact.singershow');


// Route::get('contact/registar', 'ContactFormController@create')->name('contact.registar');
// Route::post('contact/store', 'ContactFormController@store')->name('contact.store');

Route::get('/home', 'HomeController@index')->name('home');
