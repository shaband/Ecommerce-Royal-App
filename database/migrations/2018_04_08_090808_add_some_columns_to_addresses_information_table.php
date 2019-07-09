<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToAddressesInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address_informations', function (Blueprint $table) {

            $table->string('state')->nullable()->after('city') ; 
            $table->string('postal_code')->nullable()->after('state') ; 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address_informations', function (Blueprint $table) {
            //
        });
    }
}
