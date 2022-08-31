@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">District List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Division Name</th>
                            <th>District Name</th>
                            <th>Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($districts as $district)
                        <tr>
                            <td>{{$district->division->division_name}}</td>
                            <td>{{$district->district_name}}</td>
                            <td>
                                <a href="{{route('edit.district',$district->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete.district',$district->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    <h3 class="card-header">Add District</h3>
                    <div class="card-body">
                        <form action="{{route('add.district')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="Coupon_name">Division Name</label>
                                <select name="division_id" class="form-control">
                                    <option value="" selected="" disabled="">Select Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="district_name">District Name</label>
                                <input type="text" class="form-control" name="district_name" required>
                                @error('district_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add District</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>Division ------->
</div>
</section>
@endsection