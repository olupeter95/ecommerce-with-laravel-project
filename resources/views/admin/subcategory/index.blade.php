@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Subcategory List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Category</th>
                            <th>SubCategory Name En</th>
                            <th>SubCategory Name Fr</th> 
                            <th width="30%">Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($subcategory as $sub_cat)
                        <tr>
                            
                            <td>
                            @if(isset($sub_cat->category->category_name_en))    
                            {{$sub_cat->category->category_name_en}}
                            @else 
                            No category
                            @endif
                            </td>
                            <td>{{$sub_cat->subcategory_name_en}}</td>
                            <td>{{$sub_cat->subcategory_name_fr}}</td>
                            <td>
                                <a href="{{ route('edit.subcategory',$sub_cat->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.subcategory',$sub_cat->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <!---------- Add>subsubcategory ------->

            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header">Add SubCategory</h3>
                    <div class="card-body">
                        <form action="{{route('add.subcategory')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="" selected="" disabled="">Select Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_name_en">SubCategory Name En</label>
                                <input type="text" class="form-control " name="subcategory_name_en">
                                @error('subcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_name_fr">SubCategory Name Fr</label>
                                <input type="text" class="form-control" name="subcategory_name_fr">
                                @error('subcategory_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add SubCategory</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>subsubcategory ------->
</div>
</section>
@endsection