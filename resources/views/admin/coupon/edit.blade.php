@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    
    <!---------- Add coupon ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Coupon</h3>
                    <div class="card-body">
                        <form action="{{ route('update.coupon') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$coupon->id}}">
                            <div class="form-group">
                                <label for="coupon_name">Coupon Name En</label>
                                <input type="text" class="form-control" name="coupon_name" value="{{$coupon->coupon_name}}">
                                @error('coupon_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="coupon_discount">Coupon Discount</label>
                                <input type="text" class="form-control" name="coupon_discount"value= "{{$coupon->coupon_discount}}">
                                @error('coupon_discount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="coupon_validity">Coupon Validity</label>
                                <input type="date" class="form-control" name="coupon_validity"value= "{{$coupon->coupon_validity}}">
                                @error('coupon_validity')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Coupon</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add coupon ------->
</div>
</section>
@endsection