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

    //  php artisan migrate
    // php artisan migrate:rollback
    public function up()
    {
        Schema::create('board_games', function (Blueprint $table) {
            $table->id();
            $table->string('game_title');
            $table->unsignedInteger('category_id');
            $table->integer('play_hours');
            $table->integer('min_players');
            $table->integer('max_players');
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
        Schema::dropIfExists('board_games');
    }
};
