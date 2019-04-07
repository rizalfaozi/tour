<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
    
});



Route::resource('members', 'memberAPIController');



Route::resource('provinces', 'provincesAPIController');



Route::resource('villages', 'villagesAPIController');

Route::resource('roles', 'rolesAPIController');

Route::resource('commissions', 'commissionsAPIController');

Route::resource('districts', 'districtsAPIController');

Route::resource('subdistricts', 'subdistrictsAPIController');

Route::resource('categories', 'categoriesAPIController');

Route::resource('agents', 'agentsAPIController');