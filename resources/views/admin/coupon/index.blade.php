@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Coupon List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th width="25%">Coupon Name</th>
                            <th width="10%">Coupon Discount</th>
                            <th width="25%">Validity</th>
                            <th width="10%">Status</th> 
                            <th width="25%">Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->coupon_name}}</td>
                            <td>{{$coupon->coupon_discount}}%</td>
                            <td>
                            {{Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d-F -Y')}}
                            </td>
                            <td>
                                @if($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="badge badge-pill badge-success">Valid</span>
                                @else
                                <span class="badge badge-pill badge-danger">Invalid</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('edit.coupon',$coupon->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete.coupon',$coupon->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
         <!-- /.box -->
    </div><!--- end col --->
    <!---------- Add>Coupon ------->

            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header">Add Coupon</h3>
                    <div class="card-body">
                        <form action="{{route('add.coupon')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="Coupon_name">Coupon Name</label>
                                <input type="text" class="form-control" name="coupon_name" required>
                                @error('coupon_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Coupon_disc">Coupon Discount</label>
                                <input type="text" class="form-control" name="coupon_disc" required>
                                @error('coupon_disc')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Coupon_validity">Coupon Validity</label>
                                <input type="date" class="form-control" name="coupon_validity" 
                                    min="{{Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                @error('coupon_validity')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Coupon</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>Coupon ------->
</div>
</section>
@endsection