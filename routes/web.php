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
    return view('home');

});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:hrd']],function()
{

Route::get('/karyawan','KaryawanController@index');
Route::post('/karyawan/create','KaryawanController@create');
Route::get('/karyawan/{id}/edit','KaryawanController@edit');
Route::get('/karyawan/{id}/editfoto','KaryawanController@editfoto');
Route::post('/karyawan/{id}/update','KaryawanController@update');
Route::get('/karyawan/{id}/delete','KaryawanController@delete');
Route::get('/karyawan/{id}/profile','KaryawanController@profile');
Route::get('/pendapatan','KaryawanController@pendapatan');
Route::get('/karyawan/{id}/d_pendapatan','KaryawanController@d_pendapatan');
Route::post('/karyawan/{id}/t_pendapatan','KaryawanController@t_pendapatan');
Route::get('/karyawan/export','KaryawanController@export');
Route::get('/karyawan/{id}/{idpivot}/deletetunjangan','KaryawanController@deletetunjangan');
Route::get('/user','KaryawanController@user');
Route::get('/jabatan','KaryawanController@jabatan');
Route::post('/jabatan/create','KaryawanController@create_jabatan');
Route::get('/jabatan/{id}/delete','KaryawanController@delete_jabatan');
Route::get('/kantor','KaryawanController@kantor');
Route::post('/kantor/create','KaryawanController@create_kantor');
Route::get('/kantor/{id}/delete','KaryawanController@delete_kantor');
Route::get('/kesejahteraan','KaryawanController@kesejahteraan');
Route::get('/daterange', 'DateRangeController@index');
Route::post('/daterange/fetch_data', 'DateRangeController@fetch_data')->name('daterange.fetch_data');
});
Route::group(['middleware' => ['auth','checkRole:hrd,accounting']],function()
{
  Route::get('/potongan','KaryawanController@potongan');
  Route::get('/karyawan/{id}/d_potongan','KaryawanController@d_potongan');
  Route::post('/karyawan/{id}/t_potongan','KaryawanController@t_potongan');
  Route::get('/karyawan/{id}/{idpivot}/deletepengeluaran','KaryawanController@deletepengeluaran');
});
Route::group(['middleware' => ['auth','checkRole:hrd,accounting,karyawan,direktur']],function()
{
Route::get('/karyawan/{id}/slip','KaryawanController@slip');
Route::get('/dashboard','DashboardController@index');
Route::get('/home','KaryawanController@homes');
});
Route::group(['middleware' => ['auth','checkRole:hrd,direktur']],function()
{
Route::get('/laporan_gaji','KaryawanController@laporan_gaji');
Route::get('/gaji/export','KaryawanController@export');
//Route::get('/tes','KaryawanController@rentang');
});
