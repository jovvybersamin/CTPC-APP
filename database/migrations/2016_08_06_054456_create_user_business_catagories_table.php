<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBusinessCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_business_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_category_id')->unsigned();
            $table->foreign('business_category_id')
                  ->references('id')
                  ->on('business_categories')
                  ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
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
        Schema::drop('user_business_categories');
    }
}
