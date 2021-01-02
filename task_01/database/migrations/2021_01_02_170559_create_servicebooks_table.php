<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicebooks', function (Blueprint $table) {
            $table->id();
            $table->string('ownerName', 50);
            $table->unsignedBigInteger('car_id')->unique()->nullable();;
            $table->boolean('guarantee');
            $table->unsignedBigInteger('car_age_id')->unique()->nullable();;
            $table->date('startOfService');
            $table->date('stopOfService')->nullable(true);
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('car_age_id')->references('id')->on('car_ages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicebooks');
    }
}
