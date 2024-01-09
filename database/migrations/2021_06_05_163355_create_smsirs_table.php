<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsirs', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');
            $table->string('type');
            $table->string('mobile');
            $table->string('message');
            $table->string('sender');
            $table->boolean('is_success');
            $table->string('status');
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
        Schema::dropIfExists('smsirs');
    }
}
