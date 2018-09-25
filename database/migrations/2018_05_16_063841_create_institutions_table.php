<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('term_id'); $table->foreign('term_id')->references('id')->on('terms');
            $table->unsignedInteger('educational_stage_id'); $table->foreign('educational_stage_id')->references('id')->on('educational_stages');
            $table->string('username', 100)->unique();
            $table->string('password');
            $table->string('team_name');
            $table->string('institution_name');
            $table->text('institution_address');
            $table->float('points', 8, 2)->default(0.0);
            $table->timestamp('test_duration')->nullable();
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
        Schema::dropIfExists('institutions');
    }
}
