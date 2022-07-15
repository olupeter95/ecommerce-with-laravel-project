<?php 
namespace App\Actions\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;

class HomeView
{
    public function handle()
    {
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(5)->get();
        $skip_category = Category::skip(0)->first();
        $skip_product = Product::where('status',1)->where('category_id',
        $skip_category->id)->orderBy('id','DESC')->get();
       // return $skip_category->id;
        //die();
        return view('layouts.pages.home',compact('sliders','categories','products','featured',
        'skip_category','skip_product'));
    }
}
?>