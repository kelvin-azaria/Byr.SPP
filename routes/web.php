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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('siswa', 'StudentController');
Route::resource('kelas', 'ClassroomController');
Route::resource('guru', 'TeacherController');
Route::resource('tahun', 'AcademicYearController');

Route::get('/spp/{spp}','SchoolFeeController@index')->name('spp.index');
Route::get('/spp/pay/{spp}','SchoolFeeController@pay')->name('spp.pay');
Route::get('/spp/cancel/{spp}','SchoolFeeController@cancel')->name('spp.cancel_pay');

Route::get('/cari_spp','SchoolFeeController@search')->name('spp.search');
Route::post('/cari_spp','SchoolFeeController@result')->name('spp.search');

Route::get('/report/daily','ReportController@daily')->name('report.daily');
Route::get('/report/monthly','ReportController@monthly')->name('report.monthly');
Route::get('/report/yearly','ReportController@yearly')->name('report.yearly');
Route::get('/report/generate/{type}','ReportController@generate')->name('report.generate');

