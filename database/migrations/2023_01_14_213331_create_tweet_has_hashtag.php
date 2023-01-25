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
        Schema::create('tweet_has_hashtag', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('hashtag_id')->constrained('hashtags')->cascadeOnDelete();
            $table->string('hashtag');
            // $table->foreign('hashtag')->references('hashtag')->on('hashtags')->cascadeOnDelete();
            $table->foreign('hashtag')->references('hashtag')->on('hashtags');
            $table->foreignId('tweet_id')->constrained('tweets')->cascadeOnDelete();
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
        Schema::dropIfExists('tweet_has_hashtag');
    }
};
