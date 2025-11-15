<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('user_draws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('number');
            $table->boolean('is_win');
            $table->string('win_amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_draws');
    }
};
