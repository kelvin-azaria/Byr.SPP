<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::group(['middleware' => ['auth','check.approval']], function () {
  Route::get('/', 'HomeController@index')->name('home');

  Route::group(['middleware' => 'check.role'], function () {
    Route::resource('petugas', 'UserController');
    Route::resource('siswa', 'StudentController');
    Route::resource('kelas', 'ClassroomController');
    Route::resource('guru', 'TeacherController');
    Route::resource('tahun', 'AcademicYearController');
    
    Route::get('/report/generate/{type}','ReportController@generate')->name('report.generate');
    Route::get('/petugas/{id}/approve','UserController@approve')->name('petugas.approve');
    Route::get('/petugas/{id}/disapprove','UserController@disapprove')->name('petugas.disapprove');
  });
  

  Route::get('/spp/{spp}','SchoolFeeController@index')->name('spp.index');
  Route::get('/spp/pay/{spp}','SchoolFeeController@pay')->name('spp.pay');
  Route::get('/spp/cancel/{spp}','SchoolFeeController@cancel')->name('spp.cancel_pay');

  Route::get('/cari_spp','SchoolFeeController@search')->name('spp.search');
  Route::post('/cari_spp','SchoolFeeController@result')->name('spp.search');

  Route::get('/report/daily','ReportController@daily')->name('report.daily');
  Route::get('/report/monthly','ReportController@monthly')->name('report.monthly');
  Route::get('/report/yearly','ReportController@yearly')->name('report.yearly');
});

