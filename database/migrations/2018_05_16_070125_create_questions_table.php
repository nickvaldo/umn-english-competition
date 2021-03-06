<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('term_id'); $table->foreign('term_id')->references('id')->on('terms');
            $table->unsignedInteger('educational_stage_id'); $table->foreign('educational_stage_id')->references('id')->on('educational_stages');
            $table->text('question');
            $table->text('first_option');
            $table->text('second_option');
            $table->text('third_option');
            $table->text('fourth_option');
            $table->enum('answer',['A', 'B', 'C', 'D'])->default('A');
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
        Schema::dropIfExists('questions');
    }
}
