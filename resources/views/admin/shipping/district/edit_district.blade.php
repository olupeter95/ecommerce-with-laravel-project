@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    
    <!---------- Add districts ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Division</h3>
                    <div class="card-body">
                        <form action="{{ route('update.district') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$district->id}}">
                            <div class="form-group">
                                <label for="division_id">Division Name</label>
                                <select name="division_id" class="form-control">
                                <option value="" selected="">Select Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{$division->id}}" {{$division->id == $district->division_id ? 'selected' : ' '}}>{{$division->division_name}}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="division_name">District Name</label>
                                <input type="text" class="form-control" name="district_name" value="{{$district->district_name}}">
                                @error('district_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update District</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add districts ------->
</div>
</section>
@endsection