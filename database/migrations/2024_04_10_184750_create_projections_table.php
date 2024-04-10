<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('applicationCode');
            $table->boolean('isFilled');
            $table->string('expectedRevenue');
            $table->string('machineEquipment'); //array
            $table->string('workingCapital');
            $table->longText('investmentPlan');
            $table->longText('financingSource');
            $table->longText('supportNeeded');
            $table->string('challenges');
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
        Schema::dropIfExists('projections');
    }
}
