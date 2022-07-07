<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_fr',
        'subcategory_slug_en',
        'subcategory_slug_fr',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
