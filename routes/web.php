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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('permission-group', 'PermissionGroupController');

Route::get('/permission', 'PermissionController@index')->name('permission.index');
Route::get('/permission/create', 'PermissionController@create')->name('permission.create');
Route::post('/permission/store', 'PermissionController@store')->name('permission.store');