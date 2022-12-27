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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->integer('regular_price')->nullable();
            $table->integer('selling_price');
            $table->integer('stock_amount');
            $table->text('short_description')->nullable();
            $table->longtext('long_description')->nullable();
            $table->text('image');
            $table->integer('hit_count')->default(0);
            $table->tinyInteger('status');
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
};
