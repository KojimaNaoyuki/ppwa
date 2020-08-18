<?php

use Illuminate\Support\Facades\Route;

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

Route::get('toppage','BaseController@index'); //ログインフォーム

Route::get('base/studypage','BaseController@study_page'); //学習ページ
Route::get('base/study_page_picture_on','BaseController@study_page_picture_on'); //学習ページ
Route::get('db_studypage/studypage','db_studypageController@update_number'); //学習ページ
Route::post('db_studypage/post_thread','db_studypageController@post_thread'); //学習ページ
Route::post('base/up_file','BaseController@up_file'); //学習ページ

Route::get('base/judgpage','BaseController@judg_page'); //判定ページ
Route::post('base/judg_file','BaseController@judg_file'); //判定ページ
