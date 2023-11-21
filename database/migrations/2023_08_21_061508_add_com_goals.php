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
        Schema::table('Goals', function (Blueprint $table) {
            $table->integer('id_com')->unsigned()->nullable();
            $table->foreign('id_com')->references('id')->on('Teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Goals', function (Blueprint $table) {
            $table->dropColumn('id_com');
        });
    }
};