<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_id');
            $table->string('sport');
            $table->date('game_date');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('home_team');
            $table->string('away_team');
            $table->string('age_group');
            $table->string('gender');
            $table->string('classification')->nullable();
            $table->string('venue');
            $table->string('city');
            $table->string('state');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('position');
            $table->string('pay_type');
            $table->integer('base_fee');
            $table->integer('mileage');
            $table->integer('other');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
