@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-12">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Pending Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td>{{$item->order_date}}</td>
                            <td>{{$item->invoice_number}}</td>
                            <td>${{$item->amount}}</td>
                            <td>{{$item->payment_method}}</td>
                            <td>
                                <span class="badge badge-pill badge-primary">{{$item->status}}</span>
                            </td>
                            <td>
                                <a href="{{route('pending-order-details',$item->id)}}" class="btn btn-primary" title="view details"><i class="fa fa-eye"></i></a>
                                <a href="" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
  
</div>
</section>
@endsection