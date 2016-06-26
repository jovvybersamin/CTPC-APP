<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetupAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_containers',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('uuid');
            $table->string('title');
            $table->string('path');
            $table->string('url');
            $table->string('disk');
            $table->integer('owner_id');
        });

        Schema::create('assets',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('uuid');
            $table->string('file');
            $table->integer('container_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asset_containers');
        Schema::drop('assets');
    }
}
