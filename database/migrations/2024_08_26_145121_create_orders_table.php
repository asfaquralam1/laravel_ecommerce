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
            $table->integer('user_id');
            $table->string('order_number')->unique();
            $table->enum('status', ['pending', 'accept', 'cooking', 'packing', 'delivered', 'cancel', 'failed'])->default('pending');

            $table->boolean('payment_status')->default(0);             // 1 means completed
            $table->string('payment_method')->default('cash');         // for sslcommerze card_type 
            $table->decimal('grand_total', 20, 6);
            $table->unsignedInteger('item_count');
            // $table->double('subtotal', 20, 2)->nullable();
            // $table->double('shipping', 10,2)->nullable();
            // $table->string('coupon_code')->nullable();
            // $table->double('discount',10,2)->nullable();
            // $table->double('grand_total', 10, 2)->default(0);

            //User Address data
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();

             // for sslcommerze TRANSACTION INFO
             $table->string('tran_date')->nullable();
             $table->string('tran_id')->nullable();
             $table->string('val_id')->nullable();
             $table->string('amount')->nullable();
             $table->string('store_amount')->nullable(); 
             $table->string('bank_tran_id')->nullable();             
             $table->string('currency_type')->nullable();
             $table->string('currency')->nullable();
             $table->string('error')->nullable();
             // card details
             $table->string('card_type')->nullable();
             $table->string('card_no')->nullable();
             $table->string('card_brand')->nullable();
             $table->string('card_issuer')->nullable(); 
             $table->string('card_issuer_country')->nullable(); 
             $table->string('card_issuer_country_code')->nullable();

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
