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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_type')->unsigned();
            $table->foreign('package_type')->references('id')->on('packages_types');
            $table->string('price');
            $table->string('shot_description');
            $table->integer('event_registation');
            $table->integer('comunity');
            $table->integer('track_events');
            $table->integer('max_session_duration');
            $table->integer('sociall_lounge');
            $table->integer('speed_networking');
            $table->integer('tickting');
            $table->integer('event_support');
            $table->integer('allow_recording');
            $table->integer('event_branding');
            $table->integer('allow_priority_support');
            $table->integer('public_api');
            $table->integer('custom_registration');
            $table->integer('is_active');
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
        Schema::dropIfExists('packages');
    }
};
