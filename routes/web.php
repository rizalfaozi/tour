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

Route::group(['middleware' => ['roles:admin']], function () {

Route::resource('provinces', 'provincesController');

});


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('members', 'membersController');



Route::resource('villages', 'villagesController');

Route::resource('roles', 'rolesController');

Route::resource('districts', 'districtsController');

Route::resource('subdistricts', 'subdistrictsController');

Route::resource('categories', 'categoriesController');

Route::resource('agents', 'agentsController');

Route::resource('salaries', 'salariesController');

Route::resource('invoices', 'invoicesController');

Route::post('kabupaten', 'membersController@kabupaten');
Route::post('kecamatan', 'membersController@kecamatan');
Route::post('kelurahan', 'membersController@kelurahan');
Route::post('paket', 'invoicesController@paket');

Route::post('closing', 'salariesController@closing');
Route::post('user', 'invoicesController@user');
Route::get('withdraw', 'salariesController@withdraw');
Route::get('verifikasi/{user_id}/{id}', 'salariesController@verifikasi');
Route::resource('roleusers', 'roleusersController');

Route::resource('histories', 'historiesController');
Route::get('alumnus', 'schedulesController@alumnus');
Route::get('pindah/alumni/{member_id}', 'schedulesController@pindah_alumni');
Route::get('pindah/jamaah/{member_id}', 'schedulesController@pindah_jamaah');
Route::post('reqinvoices', 'schedulesController@reqinvoices');
Route::resource('schedules', 'schedulesController');

Route::resource('advertisements', 'advertisementsController');