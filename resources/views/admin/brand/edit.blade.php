@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    
    <!---------- Add Brand ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Brand</h3>
                    <div class="card-body">
                        <form action="{{ route('update.brand',$brands->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$brands->id}}">
                            <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                            <div class="form-group">
                                <label for="brand_name_en">Brand Name En</label>
                                <input type="text" class="form-control" name="brand_name_en" value="{{$brands->brand_name_en}}">
                                @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand_name_fr">Brand Name Fr</label>
                                <input type="text" class="form-control" name="brand_name_fr"value= "{{$brands->brand_name_fr}}">
                                @error('brand_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand_image">Brand Image</label>
                                <input type="file" class="form-control" name="brand_image">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add Brand ------->
</div>
</section>
@endsection