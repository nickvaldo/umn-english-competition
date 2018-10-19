<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FooterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.institution.logo', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('layout.institution.footer', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('institution.login_page', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('rule_page', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('done_page', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('test_page', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('student_page', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('test_page', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('score_page', 'App\Http\Controllers\Institution\SponsorController');
        view()->composer('institution.account_error', 'App\Http\Controllers\Institution\SponsorController');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
