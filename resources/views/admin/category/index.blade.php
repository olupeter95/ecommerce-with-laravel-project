@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Category Name En</th>
                            <th>Category Name Fr</th>
                            <th>Icon</th> 
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($category as $cat)
                        <tr>
                            <td>{{$cat->category_name_en}}</td>
                            <td>{{$cat->category_name_fr}}</td>
                            <td><i class="{{$cat->category_icon}}"></i></td>
                            <td>
                                <a href="{{ route('edit.category',$cat->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.category',$cat->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    <h3 class="card-header">Add category</h3>
                    <div class="card-body">
                        <form action="{{route('add.category')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category_name_en">Category Name En</label>
                                <input type="text" class="form-control" name="category_name_en">
                                @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name_fr">Category Name Fr</label>
                                <input type="text" class="form-control" name="category_name_fr">
                                @error('category_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_icon">Category Icon</label>
                                <input type="text" class="form-control" name="category_icon">
                                @error('category_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add category</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>category ------->
</div>
</section>
@endsection