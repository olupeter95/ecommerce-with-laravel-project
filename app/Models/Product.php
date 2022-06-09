<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
            'brand_id',
            'category_id',
            'subcategory_id',
            'subsubcategory_id',
            'product_name_en',
            'product_name_fr',
            'product_slug_en',
            'product_slug_fr',
            'product_code',
            'product_qty',
            'product_tags_en',
            'product_tags_fr',
            'product_size_en',
            'product_size_fr',
            'product_color_en',
            'product_color_fr',
            'selling_price',
            'discount_price',
            'short_desc_en',
            'short_desc_fr',
            'description_en',
            'description_fr',
            'product_thumbnail',
            'featured',
            'hot_deals',
            'special_offer',
            'special_deals',
            'status'
    ];
}
