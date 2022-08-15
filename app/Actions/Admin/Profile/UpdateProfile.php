<?php

namespace App\Actions\Admin\Profile;

use Carbon\Carbon;
use App\Models\Admin;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdminProfile\UpdateAdminRequest;

class UpdateProfile
{
    public function handle(UpdateAdminRequest $request, $id): bool 
    {
        $file = $request->file('profile_photo_path');
        $admins = Admin::find($id);
        if($file){ 
            Storage::delete('/public/upload/admin_image/'.$admins->profile_photo_path);
            $img = Image::make($file);
            $img->resize(300,200);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/admin_image/'.$name); 
            return Admin::find($id)->update([
                'name' => $request->name, 'email'=>$request->email, 'profile_photo_path' => $name,
                'created_at'=> Carbon::now()
            ]);
        }else{
            return Admin::find($id)->update([
                'name' => $request->name, 'email'=>$request->email, 'created_at'=> Carbon::now()
            ]);
        }
    }
}