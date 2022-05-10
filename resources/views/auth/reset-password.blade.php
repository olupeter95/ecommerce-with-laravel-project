@extends('home_master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Reset Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row ">
				<!-- Sign-in -->			
<div class="col-md-12 col-sm-12">
	<h4 class="">Reset Password</h4>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" 
            id="email" name="email" value="{{$request->email}}">
			@error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" 
            name="password" id="password" required>
			@error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" 
            name="password_confirmation" id="password_confirmation" required>
			@error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
	</form>					
</div>
<!-- Sign-in -->		
</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('layouts.body.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection