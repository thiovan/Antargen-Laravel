<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('fullname');
            $table->string('no_telp');
            $table->string('token');
            $table->string('status')->default(0);
            $table->boolean('admintoko')->default(false);
            $table->boolean('admintransaksi')->default(false);
            $table->boolean('manajer')->default(false);
            $table->boolean('kurir')->default(false);
            $table->boolean('pelanggan')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
