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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/send-message', ['as' => 'form-slack-send-message', 'uses' => 'SlackController@formSendMessage']);
Route::post('/send-message', ['as' => 'slack-send-message', 'uses' => 'SlackController@sendMessage']);
