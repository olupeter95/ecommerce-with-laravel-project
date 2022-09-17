@extends('home_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('layouts.body.user_sidebar')
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Hi!!!.....</span>
                        <strong>{{ Auth::user()->name }}</strong>
                        Update Your Profile
                    </h3>
                    <div class="card-body">
                        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                     <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name</label>
                        <input type="text" value="{{$user->name}}" class="form-control unicase-form-control text-input"
                        name="name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>   
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control unicase-form-control text-input"
                        name="email" value="{{$user->email}}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control unicase-form-control text-input"
                        name="phone" value="{{$user->phone}}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control unicase-form-control text-input"
                        name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-danger btn-block">Update Profile</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <br>
    </div><!--end container-->
</div>
@endsection