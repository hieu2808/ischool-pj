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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/sinhvien/index/{id}', 'LopHocController@XemDiem');
Route::get('/sinhvien/thongtin/{id}', 'SinhVienController@index');
Route::get('/giaovien/index/{id}', 'GiaoVienController@index');
Route::get('/giaovien/themdiemmh/{id}', 'GiaoVienController@getSubjectByTeacher');
Route::get('/giaovien/loptheomon/{id}', 'GiaoVienController@getClassListBySubject');
Route::get('/giaovien/diemtheolop/{id}', 'GiaoVienController@getScoreListByClass');
Route::get('/giaovien/themdiemform/{id}', 'GiaoVienController@insertScores');
