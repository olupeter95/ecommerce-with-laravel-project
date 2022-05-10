@extends('home_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img src="{{ (!empty($user->profile_photo_path)) ? 
                url('storage/upload/user_image/'.$user->profile_photo_path) : url('storage/upload/no_image.jpg')  }}" 
                alt="User Avatar" alt="" style="width:100%; height:50%; border-radius:50%"
                class="card-img-top"><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.user.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <br>
                    <h4 class="text-center">
                        <span class="text-danger"><strong>Change Your Password</strong></span>
                         </h4>
                    <br>
                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                     <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Current Pasword</label>
                        <input type="password" class="form-control unicase-form-control text-input"
                        name="current_password" id="current_password">
                        @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>   
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control unicase-form-control text-input"
                        name="password" id="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>  
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" class="form-control unicase-form-control text-input"
                        name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>  
                    
                    <button class="btn btn-danger btn-block">Change Password</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <br>
    </div><!--end container-->
</div>
@endsection