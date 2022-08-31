@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    
    <!---------- Add ships ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Division</h3>
                    <div class="card-body">
                        <form action="{{ route('update.division') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$ship->id}}">
                            <div class="form-group">
                                <label for="division_name">Division Name</label>
                                <input type="text" class="form-control" name="division_name" value="{{$ship->division_name}}">
                                @error('ships_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Division</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add ships ------->
</div>
</section>
@endsection