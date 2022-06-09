@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Brand List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Brand Name En</th>
                            <th>Brand Name Fr</th>
                            <th>Image</th>
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->brand_name_en}}</td>
                            <td>{{$brand->brand_name_fr}}</td>
                            <td><img src="{{asset('storage/upload/brand_image/'.$brand->brand_image)}}" 
                            alt="" style="border-radius:50%; width:70px; height:40px"></td>
                            <td>
                                <a href="{{ route('edit.brand',$brand->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.brand',$brand->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <!---------- Add Brand ------->

            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header">Add Brand</h3>
                    <div class="card-body">
                        <form action="{{route('add.brand')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_name_en">Brand Name En</label>
                                <input type="text" class="form-control" name="brand_name_en">
                                @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand_name_fr">Brand Name Fr</label>
                                <input type="text" class="form-control" name="brand_name_fr">
                                @error('brand_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand_image">Brand Image</label>
                                <input type="file" class="form-control" name="brand_image">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add Brand ------->
</div>
</section>
@endsection