<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('username')->unique();
            $table->string('mobile')->nullable()->unique()->index();
            $table->string('email')->nullable()->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('otp');
			$table->tinyinteger('verify')->default(0);
			$table->tinyinteger('must_login_by_sms')->default(0);
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
