<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('duration');
            $table->string('source');
            $table->string('image_cover');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('featured')->default(0);

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                  ->on('video_categories')
                  ->references('id')
                  ->onDelete('cascade');

            $table->integer('uploaded_by')->unsigned();
            $table->foreign('uploaded_by')
                  ->on('users')
                  ->references('id')
                  ->onDelete('cascade');

            $table->integer('created_by')->unsiged();
            // $table->foreign('created_by')
            //       ->on('users')
            //       ->references('id')
            //       ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
