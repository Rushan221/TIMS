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

//CRUD and admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::resource('departments', 'DepartmentController');
    Route::resource('subjects', 'SubjectController');
    Route::resource('teachers', 'TeacherController');
    Route::get('home', 'HomeController@index')->name('home');
});

Route::post('/addUser/{id}','AdminController@addAsUser')->name('addAsUser');

Auth::routes();

