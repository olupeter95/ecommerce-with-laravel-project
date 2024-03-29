<?php

namespace App\Actions\Frontend\User;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\UpdateUserRequest;
class UpdateUser 
{
    public function handle(UpdateUserRequest $request): bool
    {
        $file = $request->file('image');
        $data = User::find(Auth::user()->id);
        if($file){ 
            Storage::delete(
            '/public/upload/user_image/'.$data->profile_photo_path);
            $img = Image::make($file);
            $img->resize(300, 200);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/user_image/'.$name);
            $user = $request->all();
            $user['created_at'] = Carbon::now();
            $user['profile_photo_path'] = $name;
            return $data->update($user);         
        }
            $user = $request->except('profile_photo_path');
            $user['created_at'] = Carbon::now();
            return $data->update($user);           
    }
}
