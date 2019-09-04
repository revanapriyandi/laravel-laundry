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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('photo')->nullable();
            $table->string('api_token')->nullable();
            $table->char('role', 1)->comment('0: superadmin, 1: admin, 2: finance, 3: courier');
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->timestamps();
        });
        //Note: api_token nantinya akan berisi string random yang berfungsi sebagai token dari ajax request,
        // sedangkan outlet_id di-set nullable karena hanya user dengan status courier yang memiliki outlet.
        // Adapun relasinya belum dibuat karena table induk dalam hal ini table outlets belum tersedia.
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
