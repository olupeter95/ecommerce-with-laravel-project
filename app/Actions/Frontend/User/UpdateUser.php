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
    public function handle(UpdateUserRequest $request): Bool
    {
        $file = $request->file('image');
        $data = User::find(Auth::user()->id);
        if($file){ 
             Storage::delete('/public/upload/user_image/'.$data->profile_photo_path);
            $img = Image::make($file);
            $img->resize(300,200);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/user_image/'.$name); 
           $user = $data->update([
                'name' => $request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                 'profile_photo_path' => $name,
                 'created_at'=> Carbon::now()
            ]);
            return $user;
        }else{
           $user = $data->update([
                'name' => $request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'created_at'=> Carbon::now()
            ]);
            return $user;
        }
    }
}
?>