<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('applicationCode');
            $table->boolean('isFilled')->default(false);
            $table->longText('background');
            $table->longText('marketProblem');
            $table->longText('marketBase');
            $table->longText('prototypeDescription');
            $table->longText('marketSize');
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
        Schema::dropIfExists('business_profiles');
    }
}
