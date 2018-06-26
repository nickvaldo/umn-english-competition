<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('seedingDatabase', function () {
    /* SEEDING DATABASE */
    // Admin Table
    factory(App\Http\Model\Admin\AdminModel::class)->create();
    // Periods Table
    factory(App\Http\Model\Admin\PeriodModel::class)->create([
      'year' => 2017
    ]);
    factory(App\Http\Model\Admin\PeriodModel::class)->create([
      'year' => 2018
    ]);
    // Educational_Stages Table
    factory(App\Http\Model\Admin\Educational_StageModel::class)->create([
      'educational_stage' => 'SMA/SMK'
    ]);
    factory(App\Http\Model\Admin\Educational_StageModel::class)->create([
      'educational_stage' => 'Universitas'
    ]);
    // Terms Table
    factory(App\Http\Model\Admin\TermModel::class)->create([
      'period_id' => 1, // 2017
      'educational_stage_id' => 1, // SMA/SMK
      'term' => 'SMA/SMK PRE Elimination Test 2017',
      'number_of_question' => 100,
      'login_datetime' => date('Y-m-d 08:00:00'),
      'test_datetime' => date('Y-m-d 09:00:00'),
      'tolerance_datetime' => date('Y-m-d 11:00:00')
    ]);
    factory(App\Http\Model\Admin\TermModel::class)->create([
      'period_id' => 1, // 2017
      'educational_stage_id' => 2, // Universitas
      'term' => 'Universitas PRE Elimination Test 2017',
      'number_of_question' => 100,
      'login_datetime' => date('Y-m-d 12:00:00'),
      'test_datetime' => date('Y-m-d 13:00:00'),
      'tolerance_datetime' => date('Y-m-d 15:00:00')
    ]);
    factory(App\Http\Model\Admin\TermModel::class)->create([
      'period_id' => 2, // 2018
      'educational_stage_id' => 1, // SMA/SMK
      'term' => 'SMA/SMK PRE Elimination Test 2018',
      'number_of_question' => 100,
      'login_datetime' => date('Y-m-d 08:00:00'),
      'test_datetime' => date('Y-m-d 09:00:00'),
      'tolerance_datetime' => date('Y-m-d 11:00:00')
    ]);
    factory(App\Http\Model\Admin\TermModel::class)->create([
      'period_id' => 2, // 2018
      'educational_stage_id' => 2, // Universitas
      'term' => 'Universitas PRE Elimination Test 2018',
      'number_of_question' => 100,
      'login_datetime' => date('Y-m-d 12:00:00'),
      'test_datetime' => date('Y-m-d 13:00:00'),
      'tolerance_datetime' => date('Y-m-d 15:00:00')
    ]);
    // Institutions Table
    factory(App\Http\Model\Admin\InstitutionModel::class)->create([
      'term_id' => 1, // SMA/SMK PRE Elimination Test 2018
      'educational_stage_id' => 1, // SMA/SMK
      'username' => 'first_institution',
      'password' => Hash::make('secret'),
      'team_name' => 'The Free Louses',
      'institution_name' => 'Hawking Academy',
      'institution_address' => '948 Peninsula Drive Ringgold, GA 30736'
    ]);
    factory(App\Http\Model\Admin\InstitutionModel::class)->create([
      'term_id' => 1, // SMA/SMK PRE Elimination Test 2018
      'educational_stage_id' => 1, // SMA/SMK
      'username' => 'second_institution',
      'password' => Hash::make('secret'),
      'team_name' => 'The Afraid Monkeys',
      'institution_name' => 'Summerfield Academy',
      'institution_address' => '9757 Carson Dr.Saint Paul, MN 55104'
    ]);
    factory(App\Http\Model\Admin\InstitutionModel::class)->create([
      'term_id' => 2, // Universitas PRE Elimination Test 2018
      'educational_stage_id' => 2, // Universitas
      'username' => 'third_institution',
      'password' => Hash::make('secret'),
      'team_name' => 'The Racial Lobsters',
      'institution_name' => 'Oakland School of Fine Arts',
      'institution_address' => '33 East Rockcrest Lane Wellington, FL 33414'
    ]);
    factory(App\Http\Model\Admin\InstitutionModel::class)->create([
      'term_id' => 2, // Universitas PRE Elimination Test 2018
      'educational_stage_id' => 2, // Universitas
      'username' => 'fourth_institution',
      'password' => Hash::make('secret'),
      'team_name' => 'The Motionless Flys',
      'institution_name' => 'Grapevine University',
      'institution_address' => '9691 Ocean Lane Elkridge, MD 21075'
    ]);
    // Questions Table
    factory(App\Http\Model\Admin\QuestionModel::class, 10)->create([
      'term_id' => 1, // SMA/SMK PRE Elimination Test 2018
      'educational_stage_id' => 1, // SMA/SMK
      'question' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
      'first_option' => 'vILRU8UHZEhOflgWz9Yx',
      'second_option' => 'I0Z1a2GNt3UFZjcS5gSJ',
      'third_option' => 't53IFUP5zakjgMnQlKgu',
      'forth_option' => 'k9zKUqJZi7QDQZtoZhvw'
    ]);
    factory(App\Http\Model\Admin\QuestionModel::class, 10)->create([
      'term_id' => 2, // Universitas PRE Elimination Test 2018
      'educational_stage_id' => 2, // Universitas
      'question' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
      'first_option' => 'vILRU8UHZEhOflgWz9Yx',
      'second_option' => 'I0Z1a2GNt3UFZjcS5gSJ',
      'third_option' => 't53IFUP5zakjgMnQlKgu',
      'forth_option' => 'k9zKUqJZi7QDQZtoZhvw'
    ]);
})->describe('Seeding Database data');
