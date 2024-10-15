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
            $table->integer('user_id')->nullable();
            $table->string('order_number')->default(1);
            $table->enum('status', ['pending', 'accept', 'cooking','packing', 'delivered', 'cancel','failed' ])->default('pending');

            $table->double('subtotal', 20, 2)->nullable();
            $table->double('shipping', 10,2)->nullable();
            $table->string('coupon_code')->nullable();
            $table->double('discount',10,2)->nullable();
            $table->double('grand_total', 10, 2)->default(0);

            //User Address data
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();

            $table->boolean('payment_status')->default(0);             // 1 means completed
            $table->string('payment_method')->default('cash');         // for sslcommerze card_type
            $table->string('transaction_id',255)->nullable();
            $table->string('currency',20)->nullable();
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
