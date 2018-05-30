<?php

use Faker\Generator as Faker;
use App\Http\Model\Admin\AdminModel as Admin;
use Illuminate\Support\Facades\Hash;

$factory->define(Admin::class, function (Faker $faker) {
    return [
      'username'    => "admin",
      'password'    => Hash::make('admin1234'),
      'first_name'  => "Accounting",
      'middle_name' => "Week",
      'last_name'   => "Administrator",
      'email'       => $faker->unique()->safeEmail,
    ];
});
