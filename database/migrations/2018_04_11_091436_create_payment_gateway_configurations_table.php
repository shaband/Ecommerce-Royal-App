<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentGatewayConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateway_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchant_email')->nullable();
            $table->text('secret_key')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('site_url')->nullable();
            $table->string('cms_with_version')->nullable();
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
        Schema::dropIfExists('payment_gateway_configurations');
    }
}
