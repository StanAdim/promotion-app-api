<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_statuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('applicationCode');
            $table->boolean('isFilled')->default(false);
            $table->string('competitors'); //array
            $table->longText('competitiveAdvantage');
            $table->longText('marketStrategy');
            $table->longText('teamCapacity');
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
        Schema::dropIfExists('competition_statuses');
    }
}
