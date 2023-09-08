<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blog_categories()
    {
        return $this->hasMany('category_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne('author_id', 'id');
    }

    public function title(): Attribute
    {
       return Attribute::make(
            set: fn($value) => ucwords($value)
       );
    }

    public function shortDesc(): Attribute
    {
       return Attribute::make(
            set: fn($value) => strip_tags($value)
       );
    }

    public function post(): Attribute
    {
       return Attribute::make(
            set: fn($value) => strip_tags($value)
       );
    }
}
