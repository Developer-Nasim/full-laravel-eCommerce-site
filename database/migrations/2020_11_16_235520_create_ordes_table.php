<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordes', function (Blueprint $table) { 
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('country_name');
            $table->string('address');
            $table->string('address_optional')->default('Dhaka');
            $table->string('city');
            $table->text('phone_number');
            $table->string('email');
            $table->string('mmessage');
            $table->integer('status')->default(1);
            $table->string('customer');
            $table->integer('payment');
            $table->text('ip');
            $table->timestamps();
            


            // $table->string('name')->nullable(); 
            // $table->string('email')->nullable(); 
            // $table->string('phone')->nullable(); 
            // $table->double('amount')->nullable(); 
            // $table->longText('address')->nullable();  
            // $table->string('status')->nullable();
            // $table->string('transaction_id')->nullable();
            // $table->string('currency')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordes');
    }
}
