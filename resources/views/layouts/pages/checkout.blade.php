@extends('home_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
Checkout
@endsection
<!-- breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">


							<div id="collapseOne" class="panel-collapse collapse in">

								<!-- panel-body  -->
								<div class="panel-body">
									<div class="row">		

										<!-- shipping-info -->			
										<div class="col-md-6 col-sm-6 already-registered-login">
											<h4 class="checkout-subtitle"><b>Shipping Address</b></h4>
											<form class="register-form" action="{{route('checkout.store')}}" method="POST">
												@csrf

												<div class="form-group">
													<label class="info-title" for="shipping_name"><b>Shipping Name</b> <span>*</span></label>
													<input type="text" class="form-control unicase-form-control text-input" name="shipping_name"
													value="{{Auth::user()->name}}" placeholder="Full Name">
												</div>

												<div class="form-group">
													<label class="info-title" for="shipping_email"><b>Shipping Email</b><span>*</span></label>
													<input type="email" class="form-control unicase-form-control text-input" name="shipping_email"
													value="{{Auth::user()->email}}" placeholder="Email">
												</div>

												<div class="form-group">
													<label class="info-title" for="shipping_phone"><b>Shipping Phone</b>><span>*</span></label>
													<input type="text" class="form-control unicase-form-control text-input" name="shipping_phone"
													value="{{Auth::user()->phone}}" placeholder="Phone Number">
												</div>

												<div class="form-group">
													<label class="info-title" for="postal_code"><b>Postal Code</b><span>*</span></label>
													<input type="text" class="form-control unicase-form-control text-input" name="postal_code"
													placeholder="Postal Code">
												</div>
										</div><!--end col -->
										<!-- shipping-info -->

										<!-- already-registered-login -->
										<div class="col-md-6 col-sm-6 already-registered-login">

											<div class="form-group">
												<label for="category"><b>Division</b></label>
												<select name="division_id" class="form-control">
												<option value="" selected="">Select Division</option>
													@foreach($divisions as $ship)
													<option value="{{$ship->id}}">{{$ship->division_name}}</option>
													@endforeach
												</select>
												@error('division_id')
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="form-group">
												<label for="district_id"><b>District</b></label>
												<select name="district_id" class="form-control">
												<option value="" selected="" disabled>Select District</option>
												
												</select>
												@error('district_id')
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="form-group">
												<label for="state_id"><b>State</b></label>
												<select name="state_id" class="form-control">
												<option value="" selected="" disabled>Select State</option>
												
												</select>
												@error('state_id')
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="form-group">
												<label class="info-title" for="postal_code"><b>Notes</b></label>
												<textarea class="form-control" cols="30" rows="5" name="notes"></textarea>
											</div>
											
											
										</div>	<!--end col-->
										<!-- already-registered-login -->		

									</div><!-- row -->		
								</div><!-- panel-body  -->

							</div><!-- CollapseOne  -->
						</div><!-- checkout-step-01  -->
					</div><!-- /.checkout-steps -->
				</div><!-- /.col-md-8 -->
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
								</div>
								
									
										<ul class="nav nav-checkout-progress list-unstyled">
											@foreach($carts as $item)
											<li>
												<strong>Image:</strong>
												<img src="{{asset('/storage/upload/product/thumbnail/'.$item->options->image)}}" 
												style="width:100px; height:80px">
											</li><hr>
											<li>
												<strong>Quantity:</strong>
												{{$item->qty}}
											</li><hr>
											<li>
												<strong>Color:</strong>
												{{$item->options->color}}
											</li><hr>
											<li>
												<strong>Size:</strong>
												{{$item->options->size}}
											</li>
											@endforeach <hr>
											<li>
												@if(Session::has('coupon'))
													<strong>SubTotal:</strong>
														${{ $cartTotal }} <hr>

													<strong>Coupon Name:</strong>
													{{ session()->get('coupon')['coupon_name'] }}
													( {{ session()->get('coupon')['coupon_discount'] }} % ) <hr>
													<strong>Discount Amount:</strong>
													${{ session()->get('coupon')['discount_amount'] }}  <hr>
													<strong>Grand Total:</strong>
													${{ session()->get('coupon')['total_amount'] }} <hr>
												@else
													<strong>SubTotal:</strong>
														${{ $cartTotal }} <hr>
													<strong>Grand Total:</strong>
														${{ $cartTotal }} <hr>
												@endif
											</li>
										</ul>
											
								
							</div>
						</div>
					</div> <!-- checkout-progress-sidebar -->
				</div>

				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Select Payment Method</h4>
								</div>
								<div class="row">
									<div class="col-md-4">
										<label for="stripe">Stripe</label>
										<input type="radio" name="payment_method" value="stripe">
										<img src="{{ asset('frontend/assets/images/payments/stripe.jpg') }}" width="60px" height="25px">
									</div>	
									<div class="col-md-4">
										<label for="card">Card</label>
										<input type="radio" name="payment_method" value="card">
										<img src="{{ asset('frontend/assets/images/payments/3.png') }}" width="60px" height="25px">
									</div>	
									<div class="col-md-4">
										<label for="cash">Cash</label>
										<input type="radio" name="payment_method" value="cash">
										<img src="{{ asset('frontend/assets/images/payments/1.png') }}" width="60px" height="25px">
									</div>
								</div><!--end row-->		
								<hr>
								<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
							</div>
						</div>
					</div> <!-- checkout-progress-sidebar -->
				</div>
			</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	</div><!-- /.container -->
</div><!-- /.body-content -->


<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/shipping/district/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="district_id"]').html('');
						$('select[name="state_id"]').empty();
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/shipping/state/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 
    });
</script>
@endsection