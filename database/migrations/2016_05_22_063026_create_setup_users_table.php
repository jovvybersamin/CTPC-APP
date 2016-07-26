<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->unique('name');
        });

        Schema::create('user_roles', function(Blueprint $table){
            $table->increments('id');

            /**
             * Add unsigned for both user_id and role_id
             * in order for us to correctly formed the foreign key constraints
             */

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade');

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * Remove the attachments first
         * so we can proceed dropping the tables.
         */

        /**
         * Remove Foreign/Unique/Index
         */
        Schema::table('roles',function(Blueprint $table){
            $table->dropUnique('roles_name_unique');
        });

        Schema::table('user_roles',function(Blueprint $table){
            $table->dropForeign('user_roles_user_id_foreign');
            $table->dropForeign('user_roles_role_id_foreign');
        });

        /**
         * Drop Tables
         */
        Schema::drop('roles');
        Schema::drop('user_roles');
    }
}
