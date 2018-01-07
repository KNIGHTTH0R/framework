<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarouselTableRecreated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('carousels');

        Schema::drop('carousel_slides');

        Schema::create('carousels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('page_id');

            $table->integer('editor_id');
            $table->integer('creator_id');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('carousel_slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image_loc')->nullable();

            $table->integer('carousel_id')->nullable();
            $table->integer('order')->default(99);

            $table->string('link_type')->nullable();
            $table->string('link_url')->nullable();
            $table->string('link_target')->nullable();

            $table->integer('editor_id')->default(1);
            $table->integer('creator_id')->default(1);

            $table->softDeletes();
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
        //
    }
}
