@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <section class="content">
		  <div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">State List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Division Name</th>
                            <th>District Name</th>
                            <th>State Name</th>
                            <th>Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($states as $state)
                        <tr>
                            <td>{{$state->division->division_name}}</td>
                            <td>{{$state->district->district_name}}</td>
                            <td>{{$state->state_name}}</td>
                            <td>
                                <a href="{{route('edit.state',$state->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete.state',$state->id)}}" id="delete" title="Delete Data" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    <h3 class="card-header">Add State</h3>
                    <div class="card-body">
                        <form action="{{route('add.state')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="division_id">Division Name</label>
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
                                <label for="district_id">District Name</label>
                                <select name="district_id" class="form-control">
                                    <option value="" selected="" disabled="">Select Category</option>
                                    
                                </select>
                                @error('district_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="state_name">state Name</label>
                                <input type="text" class="form-control" name="state_name" required>
                                @error('state_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add state</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>Division ------->
</div>
</section>

<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/shipping/division/district/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
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
