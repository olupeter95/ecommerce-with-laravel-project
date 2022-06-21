@extends('admin.admin_master')
@section('content')
<section class="content">
<div class="row">
             <div class="col-md-8">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Slider List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Slider Image</th>
                            <th>Slider Title EN</th>
                            <th>Slider Description EN</th>
                            <th>Status</th> 
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($sliders as $slide)
                        <tr>
                            <td><img src="{{asset('storage/upload/Slider/'.$slide->slider_img)}}" alt="" style="width:60px;height:60px"></td>
                            <td>{{$slide->title_en}}</td>
                            <td>{{$slide->description_en}}</td>
                            <td>
                                @if($slide->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td width="40%">
                                <a href="{{ route('edit.slider',$slide->id) }}" title="Edit Data" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('delete.slider',$slide->id) }}" id="delete" title="Delete Data" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                @if($slide->status == 1)
                                <a href="{{ route('slider.inactive',$slide->id) }}" title="Inactive Now" class="btn btn-danger">
                                <i class="fa fa-arrow-down"></i>
                                 </a>
                                @else
                                <a href="{{ route('slider.active',$slide->id) }}" title="Active Now" class="btn btn-success">
                                <i class="fa fa-arrow-up"></i>
                                </a>
                                @endif
                            </td>
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
    <div class="col-md-4">
    <div class="card">
                    <div class="card-header">Add Slider</div>
                    <div class="card-body">
                        <form action="{{route('store.slider')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="description_en">Slider Title En</label>
                                <input type="text" class="form-control" name="title_en">
                                @error('title_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description_fr">Slider Title Fr</label>
                                <input type="text" class="form-control" name="title_fr">
                                @error('title_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description_en">Description En</label>
                                <input type="text" class="form-control" name="description_en">
                                @error('description_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description_fr">Description Fr</label>
                                <input type="text" class="form-control" name="description_fr">
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
                            <button type="submit" class="btn btn-primary">Add Slider</button>
                        </form>
                    </div>
                </div><!--- end card --->
    </div>
</div>
</section>
@endsection
