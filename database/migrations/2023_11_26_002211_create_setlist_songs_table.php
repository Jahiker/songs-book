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
        Schema::create('setlist_songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->foreignId('setlist_id')->references('id')->on('setlists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setlist_songs');
    }
};
