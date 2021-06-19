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
            $table->string('code');
            $table->string('slug');
            $table->text('details');
            $table->integer('regular_price');
            $table->integer('discount')->default(0);
            $table->integer('sale_price');
            $table->integer('brand_id')->nullable();
            $table->integer('shiping_info_id')->nullable();
            $table->string('stock')->default(0);
            $table->string('status');
            $table->string('is_featured')->nullable();
            $table->string('collection_type')->nullable();
            $table->string('labels')->nullable();
            $table->string('tags')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
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
