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
    return view('auth.login');
});

Auth::routes();

// Sinh viên
Route::group(['prefix' => '/sinhvien', 'middleware' => 'auth'], function() {
    Route::get('/index', 'LopHocController@XemDiem')->name('xemdiem_sv');
    Route::get('/thongtin', 'SinhVienController@index')->name('profile_sv');
    Route::get('/{id}/courseregistration/', 'SVDangKyLopHocController@index')->name('course_registration');
    Route::post('/{id}/courseregistration/', 'SVDangKyLopHocController@create')->name('course_registration.create');    
});

Route::get('/home', 'HomeController@index')->name('home');

// Giáo viên

Route::group(['prefix' => '/giaovien', 'middleware' => 'auth'], function() {
    Route::get('/index', 'GiaoVienController@index')->name('profile_gv');
    Route::get('/themdiemmh', 'GiaoVienController@getSubjectByTeacher')->name('getSubject');
    Route::get('/loptheomon/{id}', 'GiaoVienController@getClassListBySubject');
    Route::get('/diemtheolop/{id}', 'GiaoVienController@getScoreListByClass');
    Route::get('/themdiemform/{id}', 'GiaoVienController@insertScores');
});

// Admin
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'check.admin']], function() {
    Route::get('/index', 'AdminProfileController@index')->name('profile_ad');
    Route::get('/quanlylh', 'AdminProfileController@getMonHoc')->name('class_management');
    Route::get('/classbysubject/{id}', 'AdminProfileController@getClassBySubject')->name('class_list');
    Route::get('/addclassform/{mon_hoc_id}', 'AdminProfileController@addClassForm')->name('create_class');
    Route::post('/addclassform/{mon_hoc_id}', 'AdminProfileController@create')->name('create_class');

    Route::get('/assigntask/{lop_hoc_id}', 'PhanLopGiaoVienController@assignTask')->name('assign_task');
    Route::post('/assigntask/{lop_hoc_id}', 'PhanLopGiaoVienController@create')->name('assign_task');
    Route::get('/changetask/{phan_lop_id}', 'PhanLopGiaoVienController@changeTask')->name('change_task');
    Route::post('/changetask/{phan_lop_id}', 'PhanLopGiaoVienController@update')->name('change_task');
});
