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
/*Route::get('/', function(){
    return redirect()->route('loginPage');
});
Route::get('/login', 'participantController@viewLogin')->name('loginPage');
*/
Route::get('/', function(){
    return redirect()->route('user_login');
});
Route::get('/login', 'Institution\AuthController@LoginView')->name('user_login');
Route::post('/login', 'Institution\AuthController@LoginProcess')->name('user_login_process');
Route::middleware('user_gate:user')->group(function() {
    Route::get('/edit/{id}','QuestionController@show')->name('user_test');
    Route::post('/edit/{id}','QuestionController@editQst');
    Route::get('/rand','QuestionController@to')->name('user_random_process');
	//Route::get('/student_page','QuestionController@to')->name('user_random_process');
    Route::get('score_page','QuestionController@score');
	Route::get('/rule_page', function(){
		return view('rule_page');
	});
	Route::get('/student_page', function(){
		return view('student_page');
	});
	Route::get('/done_page', function(){
		Request::session()->forget('user');
		return view('done_page');
	});
});
Route::get('/acak','QuestionController@randSoal');

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
    Route::get('/admin/account_setting', 'Admin\AdminController@AccountSettingView')->name('admin_account_setting');
    Route::post('/admin/account_setting', 'Admin\AdminController@AccountSettingProcess')->name('admin_account_setting_process');
    Route::get('/admin/term/add', 'Admin\DashboardController@TermAddView')->name('admin_term_add');
    Route::post('/admin/term/add', 'Admin\DashboardController@TermAddProcess')->name('admin_term_add_process');
    Route::get('/admin/term/edit/{period_id}', 'Admin\DashboardController@TermEditView')->name('admin_term_edit');
    Route::post('/admin/term/edit/{period_id}', 'Admin\DashboardController@TermEditProcess')->name('admin_term_edit_process');
    Route::get('/admin/term/{period_id}', 'Admin\TermController@TermDashboardView')->name('admin_term_dashboard');
    /* Questions */
    Route::get('/admin/questions/{term_id}', 'Admin\QuestionController@QuestionView')->name('admin_question');
    Route::get('/admin/question/{term_id}/add', 'Admin\QuestionController@QuestionAddView')->name('admin_question_add');
    Route::post('/admin/question/{term_id}/add', 'Admin\QuestionController@QuestionAddProcess')->name('admin_question_add_process');
    Route::get('/admin/question/{term_id}/edit/{question_id}', 'Admin\QuestionController@QuestionEditView')->name('admin_question_edit');
    Route::post('/admin/question/{term_id}/edit/{question_id}', 'Admin\QuestionController@QuestionEditProcess')->name('admin_question_edit_process');
    Route::get('/admin/question/{term_id}/delete/{question_id}', 'Admin\QuestionController@QuestionDeleteProcess')->name('admin_question_delete_process');
    /* Institutions */
    Route::get('/admin/participants/institutions/{term_id}', 'Admin\InstitutionController@InstitutionView')->name('admin_institution');
    Route::get('/admin/participants/institution/{term_id}/add', 'Admin\InstitutionController@InstitutionAddView')->name('admin_institution_add');
    Route::post('/admin/participants/institution/{term_id}/add', 'Admin\InstitutionController@InstitutionAddProcess')->name('admin_institution_add_process');
    Route::get('/admin/participants/institution/{term_id}/edit/{institution_id}', 'Admin\InstitutionController@InstitutionEditView')->name('admin_institution_edit');
    Route::post('/admin/participants/institution/{term_id}/edit/{institution_id}', 'Admin\InstitutionController@InstitutionEditProcess')->name('admin_institution_edit_process');
    Route::get('/admin/participants/institution/{term_id}/delete/{institution_id}', 'Admin\InstitutionController@InstitutionDeleteProcess')->name('admin_institution_delete_process');
    /* Students */
    Route::get('/admin/participants/students/{term_id}', 'Admin\StudentController@StudentView')->name('admin_student');
    Route::get('/admin/participants/student/{term_id}/add', 'Admin\StudentController@StudentAddView')->name('admin_student_add');
    Route::post('/admin/participants/student/{term_id}/add', 'Admin\StudentController@StudentAddProcess')->name('admin_student_add_process');
    Route::get('/admin/participants/student/{term_id}/edit/{student_id}', 'Admin\StudentController@StudentEditView')->name('admin_student_edit');
    Route::post('/admin/participants/student/{term_id}/edit/{student_id}', 'Admin\StudentController@StudentEditProcess')->name('admin_student_edit_process');
    Route::get('/admin/participants/student/{term_id}/delete/{student_id}', 'Admin\StudentController@StudentDeleteProcess')->name('admin_student_delete_process');
    /* Logo */
    Route::get('/admin/logos', 'Admin\LogoController@LogoView')->name('admin_logo');
    Route::get('/admin/logo/add', 'Admin\LogoController@LogoAddView')->name('admin_logo_add');
    Route::post('/admin/logo/add', 'Admin\LogoController@LogoAddProcess')->name('admin_logo_add_process');
    Route::get('/admin/logo/edit/{logo_id}', 'Admin\LogoController@LogoEditView')->name('admin_logo_edit');
    Route::post('/admin/logo/edit/{logo_id}', 'Admin\LogoController@LogoEditProcess')->name('admin_logo_edit_process');
    Route::get('/admin/logo/delete/{logo_id}', 'Admin\LogoController@LogoDeleteProcess')->name('admin_logo_delete_procecss');
    /* Sponsor */
    Route::get('/admin/sponsors', 'Admin\SponsorController@SponsorView')->name('admin_sponsor');
    Route::get('/admin/sponsor/add', 'Admin\SponsorController@SponsorAddView')->name('admin_sponsor_add');
    Route::post('/admin/sponsor/add', 'Admin\SponsorController@SponsorAddProcess')->name('admin_sponsor_add_process');
    Route::get('/admin/sponsor/edit/{sponsor_id}', 'Admin\SponsorController@SponsorEditView')->name('admin_sponsor_edit');
    Route::post('/admin/sponsor/edit/{sponsor_id}', 'Admin\SponsorController@SponsorEditProcess')->name('admin_sponsor_edit_process');
    Route::get('/admin/sponsor/delete/{sponsor_id}', 'Admin\SponsorController@SponsorDeleteProcess')->name('admin_sponsor_delete_procecss');
    /* Slide */
    Route::get('/admin/slides', 'Admin\SlideController@SlideView')->name('admin_slide');
    Route::get('/admin/slide/add', 'Admin\SlideController@SlideAddView')->name('admin_slide_add');
    Route::post('/admin/slide/add', 'Admin\SlideController@SlideAddProcess')->name('admin_slide_add_process');
    Route::get('/admin/slide/edit/{slide_id}', 'Admin\SlideController@SlideEditView')->name('admin_slide_edit');
    Route::post('/admin/slide/edit/{slide_id}', 'Admin\SlideController@SlideEditProcess')->name('admin_slide_edit_process');
    Route::get('/admin/slide/delete/{slide_id}', 'Admin\SlideController@SlideDeleteProcess')->name('admin_slide_delete_procecss');
    /* Title */
    Route::get('/admin/title', 'Admin\TitleController@TitleView')->name('admin_title');
    Route::get('/admin/title/edit/{title_id}', 'Admin\TitleController@TitleEditView')->name('admin_title_edit');
    Route::post('/admin/title/edit/{title_id}', 'Admin\TitleController@TitleEditProcess')->name('admin_title_edit_process');
    /* Rule */
    Route::get('/admin/rule', 'Admin\RuleController@RuleView')->name('admin_rule');
    Route::get('/admin/rule/edit/{rule_id}', 'Admin\RuleController@RuleEditView')->name('admin_rule_edit');
    Route::post('/admin/rule/edit/{rule_id}', 'Admin\RuleController@RuleEditProcess')->name('admin_rule_edit_process');
});


/*
Route::get('/', function () {
    return view('welcome');
});
*/
