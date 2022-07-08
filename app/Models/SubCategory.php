<?php

namespace App\Models;


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


    public function category(){
        return $this->BelongsTo(Category::class, 'category_id', 'id');
    }

   
}
