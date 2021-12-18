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


Route::get('/admin/index/{id}', 'AdminProfileController@index');
Route::get('/admin/quanlylh/', 'AdminProfileController@getMonHoc')->name('class_management');
Route::get('/admin/classbysubject/{id}', 'AdminProfileController@getClassBySubject')->name('class_list');
Route::get('/admin/addclassform/{mon_hoc_id}', 'AdminProfileController@addClassForm')->name('create_class');
Route::post('/admin/addclassform/{mon_hoc_id}', 'AdminProfileController@create')->name('create_class');

Route::get('/admin/assigntask/{lop_hoc_id}', 'PhanLopGiaoVienController@assignTask')->name('assign_task');
Route::post('/admin/assigntask/{lop_hoc_id}', 'PhanLopGiaoVienController@create')->name('assign_task');
Route::get('/admin/changetask/{phan_lop_id}', 'PhanLopGiaoVienController@changeTask')->name('change_task');
Route::post('/admin/changetask/{phan_lop_id}', 'PhanLopGiaoVienController@update')->name('change_task');