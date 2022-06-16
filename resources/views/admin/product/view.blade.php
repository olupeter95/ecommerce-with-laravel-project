@extends('admin.admin_master')
@section('content')
<section class="content">
<div class="row">
             <div class="col-md-12">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Image</th>
                            <th>Product Name EN</th>
                            <th>Product Name Fr</th> 
                            <th>Product Quantity</th>
                            <th>Status</th> 
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($product as $prod)
                        <tr>
                            <td><img src="{{asset('storage/upload/product/thumbnail/'.$prod->product_thumbnail)}}" alt="" style="width:60px;height:60px"></td>
                            <td>{{$prod->product_name_en}}</td>
                            <td>{{$prod->product_name_fr}}</td>
                            <td>{{$prod->product_qty}}</td>
                            <td>
                                @if($prod->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td width="40%">
                            <a href="{{ route('edit.product',$prod->id) }}" title="View Details" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                                <a href="{{ route('edit.product',$prod->id) }}" title="Edit Data" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" id="delete" title="Delete Data" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                @if($prod->status == 1)
                                <a href="{{ route('product.inactive',$prod->id) }}" title="Inactive Now" class="btn btn-danger">
                                <i class="fa fa-arrow-down"></i>
                                 </a>
                                @else
                                <a href="{{ route('product.active',$prod->id) }}" title="Active Now" class="btn btn-success">
                                <i class="fa fa-arrow-up"></i>
                                </a>
                                @endif
                            </td>
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
