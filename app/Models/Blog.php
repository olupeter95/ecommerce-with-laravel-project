<?php

namespace App\Models;

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
}
