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
            $table->string('slug');
            $table->integer('cost');
            $table->integer('regular_price');
            $table->integer('sale_price');
            $table->integer('profit_margin');
            $table->integer('brand_id')->nullable();
            $table->integer('shiping_info_id')->nullable();
            $table->string('stock');
            $table->string('status');
            $table->string('is_featured')->nullable();
            $table->string('collection_type')->nullable();
            $table->string('labels')->nullable();
            $table->string('tags')->nullable();
            $table->string('tax')->nullable();
            $table->text('details');
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
