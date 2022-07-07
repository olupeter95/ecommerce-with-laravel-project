<?php

namespace App\Models;

use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name_en',
        'category_name_fr',
        'category_slug_en',
        'category_slug_fr',
        'category_icon'
    ];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class);
    }
}
