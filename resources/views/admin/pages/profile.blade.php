@extends('admin.admin_master')

@section('content')


<section class="content">
			<div class="row">

<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url({{asset('images/gallery/full/10.jpg')}}) center center;">
					  <h3 class="widget-user-username">Admin Name:  {{$admins->name}}</h3>
					  <h6 class="widget-user-desc">Admin Email: {{$admins->email}}</h6>
					  <a href="{{ route('admin.profile.edit',$admins->id) }}" style="float:right" class="btn btn-rounded btn-success mb-5">Edit profile</a>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($admins->profile_photo_path)) ? 
						url('storage/upload/admin_image/'.$admins->profile_photo_path) : url('storage/upload/no_image.jpg')  }}" 
						alt="User Avatar" style="width:100px;height:90px" >
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
</div>
</section>
@endsection