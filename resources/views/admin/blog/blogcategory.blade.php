@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Blog Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>#</th>
                            <th>Blog Category Name</th> 
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @php
                         $1 = 1;
                        @endphp
                        @foreach($categories as $cat)
                        <tr>
                            <td> {{ $i++ }}</td>
                            <td>{{$cat->blog_category}}</td>
                            <td>
                                <a href="{{ route('edit.blogcategory',$cat->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.blogcategory',$cat->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <!---------- Add>category ------->

            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header">Add Blog Category</h3>
                    <div class="card-body">
                        <form action="{{route('add.blogcategory')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="blog_category">Blog Category</label>
                                <input type="text" class="form-control" name="blog_category">
                                @error('blog_category')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Blog Category</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>category ------->
</div>
</section>
@endsection