@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-12">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">All Blogs</h3>
              <a href="{{ route('new.blogpost') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i>&nbsp; New Blog</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Description</th> 
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/blog/image'.$blog->image)}}" alt="blog image">
                            </td>
                            <td>{{blog->blog_categories->blog_category}}</td>
                            <td>{{blog->admin->name}}</td>
                            <td>{{blog->title}}</td>
                            <td>{{blog->short_desc}}</td>
                            <td>{{blog->post}}</td>
                            <td>
                                <a href="{{ route('edit.blogpost',$blog->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.blogpost',$blog->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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