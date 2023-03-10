<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('customer_id');
            $table->float('amount', 11, 2);
            $table->integer('tax_amount');
            $table->integer('shipping_cost');
            $table->text('delivery_address');
            $table->text('order_date')->nullable();
            $table->text('order_status')->default('PENDING');
            $table->text('order_timestamps')->nullable();
            $table->text('payment_type');
            $table->text('payment_status')->default('PENDING');
            $table->text('transaction_id')->nullable();
            $table->text('payment_date')->nullable();
            $table->text('payment_timestamps')->nullable();
            $table->text('delivery_status')->default('PENDING');
            $table->text('delivery_date')->nullable();
            $table->text('delivery_timestamps')->nullable();
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
};
