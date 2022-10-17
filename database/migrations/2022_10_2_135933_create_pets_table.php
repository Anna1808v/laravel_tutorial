<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
    {
        Schema::create('pets', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('animal');
            $table->string('passport_id');

            $table->softDeletes();

            $table->unsignedBigInteger('category_id')->nullable();

            $table->index('category_id', 'pet_category_idx');

            $table->foreign('category_id', 'pet_category_fk')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
