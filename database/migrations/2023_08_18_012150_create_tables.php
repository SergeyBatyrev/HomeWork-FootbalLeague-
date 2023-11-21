<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('emblem', 255)->nullable();
            $table->string('city', 80);
            $table->string('name_stadium', 150);
            $table->string('coach', 150);
            $table->string('photo_coach', 255)->nullable();
            
        });
        Schema::create('Matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_com1')->unsigned();
            $table->foreign('id_com1')->references('id')->on('Teams')->onDelete('cascade');
            $table->integer('id_com2')->unsigned();
            $table->foreign('id_com2')->references('id')->on('Teams')->onDelete('cascade');
            $table->dateTime('date');
            $table->integer('win_com')->unsigned();
            $table->foreign('win_com')->references('id')->on('Teams')->onDelete('cascade');
            $table->integer('id_city')->unsigned();
            $table->foreign('id_city')->references('id')->on('Teams')->onDelete('cascade');
            
        });
        Schema::create('News', function (Blueprint $table) {
            $table->increments('id');
            $table->string('summary', 50);
            $table->string('short_description', 150);
            $table->string('full_text', 500);
            $table->string('imagesPath', 255)->nullable();
            // $table->integer('id_category')->unsigned()->nullable();
            // $table->foreign('id_category')->references('id')->on('Categories')->onDelete('cascade');
        });
      

        Schema::create('Players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->unique();
            $table->string('photo', 255)->nullable();
            $table->string('position', 100);
            $table->integer('id_team')->unsigned();
            $table->foreign('id_team')->references('id')->on('Teams')->onDelete('cascade');
        });
        Schema::create('Goals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_match')->unsigned();
            $table->foreign('id_match')->references('id')->on('Matches')->onDelete('cascade');
            $table->integer('id_player')->unsigned();
            $table->foreign('id_player')->references('id')->on('Players')->onDelete('cascade');
            $table->time('minuts');
            $table->integer('assistant')->unsigned();
            $table->foreign('assistant')->references('id')->on('Players')->onDelete('cascade');
        });
        Schema::create('Red_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_match')->unsigned();
            $table->foreign('id_match')->references('id')->on('Matches')->onDelete('cascade');
            $table->integer('id_player')->unsigned();
            $table->foreign('id_player')->references('id')->on('Players')->onDelete('cascade');
            $table->time('minuts');
        });
        Schema::create('Yellow_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_match')->unsigned();
            $table->foreign('id_match')->references('id')->on('Matches')->onDelete('cascade');
            $table->integer('id_player')->unsigned();
            $table->foreign('id_player')->references('id')->on('Players')->onDelete('cascade');
            $table->time('minuts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Teams');
        Schema::dropIfExists('Matches');
        Schema::dropIfExists('News');
        Schema::dropIfExists('Players');
        Schema::dropIfExists('Goals');
        Schema::dropIfExists('Red_cards');
        Schema::dropIfExists('Yellow_cards');
    }
};
