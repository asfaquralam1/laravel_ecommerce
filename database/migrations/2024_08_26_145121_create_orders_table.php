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
            $table->double('subtotal', 20, 6);
            $table->double('shipping', 10,2);
            $table->string('coupon_code')->nullable();
            $table->double('discount',10,2)->nullable();
            $table->double('grand_total', 10, 2);

            //User Address data
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('district');
            // $table->string('zip');
            $table->string('country');

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
