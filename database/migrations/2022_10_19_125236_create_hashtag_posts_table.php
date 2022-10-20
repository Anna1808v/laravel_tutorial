<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashtagPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashtag_posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('hashtag_id');

            $table->index('pet_id', 'pet_hashtag_pet_idx');
            $table->index('hashtag_id', 'pet_hashtag_tag_idx');

            $table->foreign('pet_id', 'pet_hashtag_pet_fk')->on('pets')->references('id');
            $table->foreign('hashtag_id', 'pet_hashtag_hashtag_fk')->on('hashtags')->references('id');

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
        Schema::dropIfExists('hashtag_posts');
    }
}
