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
                        <p>Welcome to La Cime Fashion Store</p>
                    </h3>
                </div>
            </div>
        </div><!--end row-->
    </div><!--end container-->
</div>
@endsection