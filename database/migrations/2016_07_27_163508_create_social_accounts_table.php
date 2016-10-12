<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true)->nullable();
            $table->string('token');
            $table->string('refresh_token')->nullable();
            $table->string('expires_in')->nullable();
            $table->string('provider');
            $table->string('provider_user_id');
            $table->string('nickname')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('social_accounts');
    }
}
