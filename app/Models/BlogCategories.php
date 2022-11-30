<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blogcategory(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucwords($value)
        ); 
    }
}
