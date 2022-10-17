@extends('home_master')
@section('content')
@section('title')
Cash on Delivery Payment
@endsection
<!-- breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ route('home')}}">Home</a></li>
				<li class='active'>Cash</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Shopping Cost</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                    
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
                        </div>
                    </div> <!-- checkout-progress-sidebar -->
                </div>

                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>
                            

                                <form action="{{ route('cash-order') }}" method="POST" id="payment-form">
                                  @csrf
                                    <div class="form-row">
                                        <label for="card-element">
                                          <input type="hidden" name="name" value="{{ $data['shipping_name']}}">
                                          <input type="hidden" name="email" value="{{ $data['shipping_email']}}">
                                          <input type="hidden" name="phone" value="{{ $data['shipping_phone']}}">
                                          <input type="hidden" name="postal_code" value="{{ $data['postal_code']}}">
                                          <input type="hidden" name="division_id" value="{{ $data['division_id']}}">
                                          <input type="hidden" name="district_id" value="{{ $data['district_id']}}">
                                          <input type="hidden" name="state_id" value="{{ $data['state_id']}}">
                                          <input type="hidden" name="notes" value="{{ $data['notes']}}">
                                        </label>
                                        
                                       
                                        
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Submit Payment</button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- checkout-progress-sidebar -->
                </div>

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection