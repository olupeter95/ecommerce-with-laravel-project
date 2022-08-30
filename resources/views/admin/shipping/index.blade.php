@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Division List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Division Name</th>
                            <th>Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($ships as $ship)
                        <tr>
                            <td>{{$ship->division_name}}</td>
                            <td>
                                <a href="{{route('edit.division',$ship->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete.division',$ship->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    <h3 class="card-header">Add Division</h3>
                    <div class="card-body">
                        <form action="{{route('add.division')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="Coupon_name">Division Name</label>
                                <input type="text" class="form-control" name="division_name" required>
                                @error('division_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Division</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>Division ------->
</div>
</section>
@endsection