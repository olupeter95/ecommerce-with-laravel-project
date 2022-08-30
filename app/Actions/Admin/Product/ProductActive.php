<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
class ProductActive 
{   
    /**
     * Undocumented function
     *
     * @param int $id
     * @return Redirector|RedirectResponse
     */
    public function handle(int $id): Redirector|RedirectResponse
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = [
            'message' => 'Product Active',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
