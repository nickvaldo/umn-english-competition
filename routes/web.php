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
Route::post('/admin/login', 'Admin\AuthController@LoginProcess')->name('admin_login_process');
Route::middleware('admin_gate:admin')->group(function() {
    /* Logout */
    Route::get('/admin/logout', function() {
        session()->flush();
        return redirect()->route('admin_login');
    });
    Route::get('/admin', function(){
        return redirect()->route('admin_dashboard');// Redirect to Dashboard
    });
    /* Dashboard and Terms */
    Route::get('/admin/index', 'Admin\DashboardController@DashboardView')->name('admin_dashboard');
    Route::get('/admin/term/add', 'Admin\DashboardController@TermAddView')->name('admin_term_add');
    Route::post('/admin/term/add', 'Admin\DashboardController@TermAddProcess')->name('admin_term_add_process');
    Route::get('/admin/term/edit/{period_id}', 'Admin\DashboardController@TermEditView')->name('admin_term_edit');
    Route::post('/admin/term/edit/{period_id}', 'Admin\DashboardController@TermEditProcess')->name('admin_term_edit_process');
    Route::get('/admin/term/{period_id}', 'Admin\TermController@TermDashboardView')->name('admin_term_dashboard');
});


/*
Route::get('/', function () {
    return view('welcome');
});
*/
