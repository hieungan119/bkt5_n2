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
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name_vn', 191);
            $table->string('movie_name_en', 191);
            $table->text('overview')->nullable();
            $table->date('release_date');
            $table->float('vote_average', 8, 1)->default(0);
            $table->float('popularity', 10, 1)->default(0);
            $table->string('image', 191)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
};
