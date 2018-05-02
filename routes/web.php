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

/* PARTICIPANT */
Route::get('/', function(){
    return redirect()->route('loginPage');
});
Route::get('/login', 'participantController@viewLogin')->name('loginPage');

/* ADMIN */
Route::get('/admin', function(){
    return redirect()->route('adminLoginPage');
});
Route::get('/admin/login', 'adminController@viewLogin')->name('adminLoginPage'); 

/*
Route::get('/', function () {
    return view('welcome');
});
*/
