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
                    <h3 class="text-center">
                        <span class="text-danger">Hi!!!.....</span>
                        <strong>{{ Auth::user()->name }}</strong>
                        welcome to Rock Store
                    </h3>
                </div>
            </div>
        </div><!--end row-->
    </div><!--end container-->
</div>
@endsection