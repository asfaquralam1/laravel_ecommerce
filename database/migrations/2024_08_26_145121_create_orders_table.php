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
            $table->integer('product_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('status', ['pending', 'accept', 'cooking', 'packing', 'delivered', 'cancel', 'failed'])->default('pending');

            $table->decimal('grand_total', 20, 6);
            $table->unsignedInteger('item_count');
            $table->boolean('payment_status')->default(0);             // 1 means completed
            $table->string('payment_method')->default('cash');         // for sslcommerze card_type
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
