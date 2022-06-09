@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">SubSubcategory List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>SubCategory Name En</th>
                            <th width="30%">Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($subsubcategory as $subcats)
                        <tr>
                            <td>{{$subcats->category->category_name_en}}</td>
                            <td>{{$subcats->subcategory->subcategory_name_en}}</td>
                            <td>{{$subcats->subsubcategory_name_en}}</td>
                           
                            <td>
                                <a href="{{ route('edit.subsubcategory',$subcats->id)}}" title="Edit Data" class="btn btn-info "><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.subsubcategory',$subcats->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    <h3 class="card-header">Add Sub SubCategory</h3>
                    <div class="card-body">
                        <form action="{{route('add.subsubcategory')}}" method="post">
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
                                <label for="subcategory">Sub Category</label>
                                <select name="subcategory_id" class="form-control">
                                    <option value="" selected="" disabled="">Select Category</option>
                                    
                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subsubcategory_name_en">SubSubCategory Name En</label>
                                <input type="text" class="form-control " name="subsubcategory_name_en">
                                @error('subsubcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subsubcategory_name_fr">SubSubCategory Name Fr</label>
                                <input type="text" class="form-control" name="subsubcategory_name_fr">
                                @error('subsubcategory_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add SubSubCategory</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>subsubcategory ------->
</div>
</section>
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
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