<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->nullable(); 
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); 

            $table->string('invoice_id')->nullable(); 
            $table->string('amount')->nullable(); 
            $table->string('currency')->nullable(); 
            $table->string('reference_no')->nullable(); 
            $table->string('transaction_id')->nullable(); 
            $table->enum('status' , ['payment_success' , 'payment_failed'])->nullable(); 

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
        Schema::dropIfExists('transactions');
    }
}
