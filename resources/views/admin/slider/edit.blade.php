@extends('admin.admin_master')
@section('content')

        <section class="content">
		  <div class="row">
    
        <!---------- Add Brand ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Slider</h3>
                    <div class="card-body">
                        <form action="{{ route('update.slider',$slider->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$slider->id}}">
                            <input type="hidden" name="old_image" value="{{$slider->slider_img}}">
                            <div class="form-group">
                                <label for="title_en">Title En</label>
                                <input type="text" class="form-control" name="title_en" value="{{$slider->title_en}}">
                                @error('title_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title_fr">Title Fr</label>
                                <input type="text" class="form-control" name="title_fr" value="{{$slider->title_fr}}">
                                @error('title_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description_en">Description En</label>
                                <input type="text" class="form-control" name="description_en" value="{{$slider->description_en}}">
                                @error('description_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description_fr">Description Fr</label>
                                <input type="text" class="form-control" name="description_fr" value="{{$slider->description_fr}}">
                                @error('description_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slider_img">Slider Image</label>
                                <input type="file" class="form-control" name="slider_img">
                                @error('slider_img')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <img src="{{asset('storage/upload/slider/'.$slider->slider_img)}}" alt="" style="height:100px;width:80px">
                            <button type="submit" class="btn btn-primary">Update Slider</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add Brand ------->
</div>
</section>
@endsection