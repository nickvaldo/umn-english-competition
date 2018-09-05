<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_question', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('soal_id'); $table->foreign('soal_id')->references('id')->on('questions');
            $table->unsignedInteger('user_id'); $table->foreign('user_id')->references('id')->on('institutions');
            $table->text('question');
            $table->string('first_opt');
            $table->string('second_opt');
            $table->string('third_opt');
            $table->string('forth_opt');
            $table->string('answer');
            $table->unsignedInteger('mod_soal');
            $table->string('answer_user');
            $table->string('time_close')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_question');
    }
}
