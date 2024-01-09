<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('currency_id')->nullable()->constrained();
            $table->decimal('amount', 12, 3);
            $table->decimal('partner_amount', 12, 3);
            $table->unsignedSmallInteger('quantity')->nullable();
            $table->string('image');
            $table->string('media')->nullable();
            $table->unsignedSmallInteger('score');
            $table->string('type')->index();
            $table->string('status')->index();
            $table->longText('form')->nullable();
            $table->unsignedInteger('delivery_time');
            $table->foreignId('category_id')->nullable()->index()->constrained();
            //manager
            $table->string('manager_mobile')->nullable();
            //discount
            $table->string('discount_type');
            $table->unsignedMediumInteger('discount_amount');
            $table->date('discount_starts_at')->nullable();
            $table->date('discount_expires_at')->nullable();
            //helped field
            $table->bigInteger('sold_item')->index();
            //seo
            $table->text('seo_keywords');
            $table->string('seo_description');
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
        Schema::dropIfExists('products');
    }
}
