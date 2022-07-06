<?php
namespace App\Actions\Admin\Category;

use App\Models\Category;
use App\Http\Requests\category\StoreCategoryRequest;
use Carbon\Carbon;

Class CreateCategory 
{

    public function handle(StoreCategoryRequest $request): Category
    {
        $category =  Category::create([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en'=>strtolower(str_replace('','_',$request->category_name_en)),
            'category_slug_fr'=>strtolower(str_replace('','_',$request->category_name_fr)),
            'category_icon' => $request->category_icon,
            'created_at'=> Carbon::now()
        ]);

        return $category;
    }
}
?>