<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
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
            $table->string('hasProjInfo')->default(false);
            $table->string('hasCompInfo')->default(false);
            $table->string('hasBusiInfo')->default(false);
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
        Schema::dropIfExists('personal_profiles');
    }
}
