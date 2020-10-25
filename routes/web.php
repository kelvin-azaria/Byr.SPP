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
Route::resource('spp', 'SchoolFeeController')->except([
  'index'
]);

Route::get('/spp/{spp}','SchoolFeeController@index')->name('spp.index');
Route::get('/cari_spp','SchoolFeeController@search')->name('spp.search');
Route::post('/cari_spp','SchoolFeeController@result')->name('spp.search');
