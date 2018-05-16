<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('period_id'); $table->foreign('period_id')->references('id')->on('periods');
            $table->unsignedInteger('educational_stage_id'); $table->foreign('educational_stage_id')->references('id')->on('educational_stages');
            $table->string('term');
            $table->integer('number_of_question')->default(100);
            $table->timestamp('login_datetime');
            $table->timestamp('test_datetime');
            $table->timestamp('tolerance_datetime');
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
        Schema::dropIfExists('terms');
    }
}
