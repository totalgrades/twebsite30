<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title');
            $table->string('job_salary')->nullable();
            $table->string('job_type')->nullable();
            $table->string('intro', 700)->nullable();
            $table->string('about_us_title')->nullable();
            $table->string('about_us', 700)->nullable();
            $table->string('d_and_r_title')->nullable();
            $table->string('duties_and_responsibilities', 700)->nullable();
            $table->string('afterword', 700)->nullable();
            $table->date('date_closing')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
