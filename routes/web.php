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
Route::get('/admin/login', 'Admin\AuthController@LoginView')->name('admin_login');
Route::post('/admin/login', 'Admin\AuthController@LoginProcess')->name('admin_login');
Route::middleware('admin_gate:admin')->group(function() {
    Route::get('/admin', function(){
        return redirect()->route('admin_dashboard');// redirect harusnya ke homepage
    });
    Route::get('/admin/index', 'Admin\DashboardController@DashboardView')->name('admin_dashboard');
});


/*
Route::get('/', function () {
    return view('welcome');
});
*/
