<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToAccountInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_informations', function (Blueprint $table) {
                

            $table->string('cc_country_code')->nullable()->after('last_name'); 
            $table->string('phone_number')->nullable()->after('cc_country_code'); 
            $table->string('city')->nullable()->after('phone_number'); 
            $table->string('state')->nullable()->after('city'); 
            $table->string('country')->nullable()->after('state'); 
            $table->string('postal_code')->nullable()->after('country'); 



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_informations', function (Blueprint $table) {
            
        });
    }
}
