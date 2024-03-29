<?php

namespace App\Actions\Admin\Category;

use Carbon\Carbon;
use App\Models\Category;
use App\Http\Requests\category\StoreCategoryRequest;
class UpdateCategory 
{
    public function handle(StoreCategoryRequest $request): bool
    {
        $id = $request->id;
        return Category::find($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace(' ', '_', $request->category_name_en)),
            'category_slug_fr' => strtolower(str_replace(' ', '_', $request->category_name_fr)),
            'category_icon' => $request->category_icon,
            'created_at'=> Carbon::now()
        ]);
    }

}
