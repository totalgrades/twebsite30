<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name')->unique();
            $table->string('preferedDomainName')->unique();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('school_address');
            $table->string('city');
            $table->string('state');
            $table->text('about_school')->nullable();
            $table->boolean('must_agree')->defualt(0);
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
        Schema::dropIfExists('registration_schools');
    }
}
