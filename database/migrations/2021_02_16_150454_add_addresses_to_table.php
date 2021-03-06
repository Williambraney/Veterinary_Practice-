<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressesToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owners', function (Blueprint $table) {
            //add new column
            $table->string("address_1", 100);
            $table->string("address_2", 100)->nullable($value=true);
            $table->string("town", 40);
            $table->string("postcode", 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            //
            $table->dropColumn("address_1");
            $table->dropColumn("address_2");
            $table->dropColumn("town");
            $table->dropColumn("postcode");
        });
    }
}
