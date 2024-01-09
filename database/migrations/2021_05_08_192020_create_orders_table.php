<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('mobile');
            $table->string('email');
            $table->text('description')->nullable();

            $table->unsignedInteger('price');
            $table->unsignedInteger('discount');
            $table->foreignId('voucher_id')->nullable()->index()->constrained();
            $table->unsignedInteger('voucher_amount');
            $table->unsignedInteger('wallet_pay');
            $table->unsignedInteger('total_price');
            $table->timestamp('delivery_time');
            $table->string('status')->index();

            $table->foreignId('user_id')->index()->constrained();
            $table->string('user_ip');
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
        Schema::dropIfExists('orders');
    }
}
