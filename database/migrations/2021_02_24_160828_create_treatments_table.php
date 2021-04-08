<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
        });

        Schema::create('animal_treatment', function (Blueprint $table) {
            $table->id();
            $table->foreignId("animal_id")
                  ->constrained()
                  ->onDelete("cascade");

            $table->foreignId("treatment_id")
                  ->constrained()
                  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // always delete the pivot table first
        // should always drop the tables in reverse order
        Schema::dropIfExists('animal_treatment');
        Schema::dropIfExists('treatments');
    }
}
