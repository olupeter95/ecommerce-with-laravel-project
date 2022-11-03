<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function multiimage()
    {
        return $this->hasMany(MultiImage::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'subsubcategory_id', 'id');
    }
    
    public function shortDescEn(): Attribute
    {
        return Attribute::make(
            get: fn($value) => strip_tags($value)
        );
    }

    public function descriptionEn(): Attribute
    {
        return Attribute::make(
            get: fn($value) => strip_tags($value)
        );
    }
    
}
