<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('comunity_id')->unsigned();
            $table->foreign('comunity_id')->references('id')->on('comunities');
            $table->string('event_type');
            $table->string('event_title');
            $table->string('event_start_date');
            $table->string('event_start_time');
            $table->string('event_end_date');
            $table->string('event_end_time');
            $table->bigInteger('time_zone_id')->unsigned();
            $table->foreign('time_zone_id')->references('id')->on('time_zones');
            $table->string('is_active');
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
        Schema::dropIfExists('events');
    }
};
