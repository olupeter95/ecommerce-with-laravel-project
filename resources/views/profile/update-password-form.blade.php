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