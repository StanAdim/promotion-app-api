<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_applications', function (Blueprint $table) {
            $table->id();
            $table->string('applicationCode');
            $table->string('fullName');
            $table->string('birthYear');
            $table->string('nidaNumber');
            $table->string('educationLevel');
            $table->string('BusinessRegStatus');
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('businessSector')->nullable();
            $table->string('businessName')->nullable();
            $table->string('businessLocation')->nullable();
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
        Schema::dropIfExists('profile_applications');
    }
}
