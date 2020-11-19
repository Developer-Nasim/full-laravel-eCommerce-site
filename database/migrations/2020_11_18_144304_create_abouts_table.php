<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('payment');
            $table->text('number');
            $table->text('email');
            $table->text('address');
            $table->text('lat');
            $table->text('long');
            $table->text('fb');
            $table->text('tw');
            $table->text('lk');
            $table->text('ins');
            $table->text('pin');
            $table->text('yt');
            $table->text('about_desc');
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
        Schema::dropIfExists('abouts');
    }
}
