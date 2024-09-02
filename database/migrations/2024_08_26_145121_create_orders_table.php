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
            // $table->string('product_title')->nullable();
            // $table->integer('price')->nullable();
            // $table->integer('quantity')->nullable();
            // $table->integer('total_price')->nullable();
            // $table->string('image')->nullable();
            // $table->integer('product_id')->nullable();
            // $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('order_name')->nullable();
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
