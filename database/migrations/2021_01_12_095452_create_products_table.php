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
            $table->string('name');
            $table->integer('type_product_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->string('origin');
            $table->string('material');
            $table->string('size');
            $table->integer('unit_price');
            $table->integer('promotion_price')->nullable();
            $table->string('unit');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
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
