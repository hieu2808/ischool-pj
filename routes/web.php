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
    Route::get('/index', 'LopHocController@XemDiem')->name('getDiemSV'); 
    Route::get('/thongtin', 'SinhVienController@index')->name('getProfileSV'); 
    Route::get('/courseregistration', 'SVDangKyLopHocController@index')->name('getCourseRegistration');
    Route::post('/courseregistration', 'SVDangKyLopHocController@create')->name('postCourseRegistration'); // chưa làm xong...
});

// Giáo viên
Route::group(['prefix' => '/giaovien', 'middleware' => 'auth'], function() {
    //Lấy thông tin giáo viên
    Route::get('/index', 'GiaoVienController@index')->name('getProfileGV'); 

    //Lấy thông tin môn học theo giáo viên
    Route::get('/themdiemmh', 'GiaoVienController@getSubjectByTeacher')->name('getSubject'); 

    //Lấy thông tin lớp học theo ID Môn Học 
    Route::get('/loptheomon/{mon_hoc_id}', 'GiaoVienController@getClassListBySubject')->name('getClassGV'); 

    //Phương thức đánh giá
    Route::get('/phuongthucdanhgia/{lop_hoc_id}', 'PhuongThucDanhGiaController@getEvaluation')->name('getEvaluation'); //Lấy thông tin phương thức đánh giá theo ID lớp học
    Route::post('/phuongthucdanhgia', 'PhuongThucDanhGiaController@postAddEvaluation')->name('postAddEvaluation'); //Thêm phương thức đánh giá
    Route::post('/phuongthucdanhgia/delete', 'PhuongThucDanhGiaController@postDeleteEvaluation')->name('postDeleteEvaluation'); //Thêm phương thức đánh giá
    
    //Lấy thông tin điểm theo ID Lớp Học
    Route::get('/diemtheolop/{lop_hoc_id}', 'GiaoVienController@getScoreListByClass')->name('getScoreGV'); 
    Route::get('/themdiemform/{lop_hoc_id}', 'DiemMonHocController@getAddScores')->name('getAddScore'); 
    Route::post('/themdiem/{lop_hoc_id}', 'DiemMonHocController@postAddScores')->name('postAddScore'); 
});

// Admin
Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function() {
    Route::get('/index', 'AdminProfileController@index')->name('getProfileAD');
    Route::get('/quanlylh', 'AdminProfileController@getMonHoc')->name('getClassManagement');
    Route::get('/classbysubject/{mon_hoc_id}', 'AdminProfileController@getClassBySubject')->name('getClassList');
    Route::get('/addclassform/{mon_hoc_id}', 'AdminProfileController@addClassForm')->name('getCreateClass');
    Route::post('/addclassform/{mon_hoc_id}', 'AdminProfileController@create')->name('postCreateClass');

    Route::get('/assigntask/{lop_hoc_id}', 'PhanLopGiaoVienController@assignTask')->name('getAssignTask');
    Route::post('/assigntask/{lop_hoc_id}', 'PhanLopGiaoVienController@create')->name('postAssignTask');
    Route::get('/changetask/{lop_hoc_id}', 'PhanLopGiaoVienController@changeTask')->name('getChangeTask');
    Route::post('/changetask/{lop_hoc_id}', 'PhanLopGiaoVienController@update')->name('postChangeTask');
});
