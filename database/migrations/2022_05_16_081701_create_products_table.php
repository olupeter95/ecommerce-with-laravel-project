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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_fr');
            $table->string('product_slug_en');
            $table->string('product_slug_fr');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_fr');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_fr')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_fr');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_desc_en');
            $table->string('short_desc_fr');
            $table->string('description_en');
            $table->string('description_fr');
            $table->string('product_thumbnail');
            $table->string('featured')->nullable();
            $table->string('hot_deals')->nullable();
            $table->string('special_offer')->nullable();
            $table->string('special_deals')->nullable();
            $table->integer('status')->default(0);
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
