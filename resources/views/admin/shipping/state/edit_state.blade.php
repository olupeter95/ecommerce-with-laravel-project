@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <section class="content">
		  <div class="row">
    
    <!---------- Add districts ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit State</h3>
                    <div class="card-body">
                        <form action="{{ route('update.state') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$state->id}}">
                            <div class="form-group">
                                <label for="division_id">Division Name</label>
                                <select name="division_id" class="form-control">
                                <option value="" selected="">Select Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{$division->id}}" {{$division->id == $state->division_id ? 'selected' : ' '}}>{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="district_id">District Name</label>
                                <select name="district_id" class="form-control">
                                    <option value="{{$state->district_id}}" selected="">{{$state->district->district_name}}</option>
                                </select>
                                @error('district_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="state_name">State Name</label>
                                <input type="text" class="form-control" name="state_name" value="{{$state->state_name}}">
                                @error('state_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update State</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add districts ------->
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