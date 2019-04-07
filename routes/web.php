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

Route::resource('members', 'membersController');

Route::resource('provinces', 'provincesController');

Route::resource('villages', 'villagesController');

Route::resource('roles', 'rolesController');

Route::resource('commissions', 'commissionsController');

Route::resource('districts', 'districtsController');

Route::resource('subdistricts', 'subdistrictsController');

Route::resource('categories', 'categoriesController');

Route::resource('agents', 'agentsController');