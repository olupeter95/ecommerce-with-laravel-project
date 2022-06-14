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
                                <a href="{{ route('edit.product',$prod->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.product',$prod->id) }}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
