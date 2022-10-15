@extends('admin.admin_master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<section class="content">
<div class="row">

<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.profile.update',$admin->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
					  <div class="row">
						<div class="col-12">						
						 <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
								<h5>Admin Username <span class="text-danger">*</span></h5>
								<div class="controls">
								 <input type="text" name="name" class="form-control" value="{{$admin->name}}">
                                 @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
							  </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
								 <h5>Admin Email <span class="text-danger">*</span></h5>
								<div class="controls">
								 <input type="text" name="email" class="form-control"value="{{$admin->email}}">
                                 @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
							 </div>
                         </div>
                      </div>
					<div class="row">
                        <div class="col-md-6">
                         <div class="form-group">
							<h5>Profile Image <span class="text-danger">*</span></h5>
							<div class="controls">
							<input type="file" id="image" name="profile_photo_path" class="form-control">
                            @error('profile_photo_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                           </div>
						</div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <img id="showimage" src="{{ (!empty($admin->profile_photo_path)) ? 
                              url('storage/upload/admin_image/'.$admin->profile_photo_path) : url('storage/upload/no_image.jpg')  }}" 
                             alt="User Avatar" alt="" style="width:100px; height:100px">
                            </div>
                        </div>
                     </div>
                    </div>	
				</div>
            			<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>


</div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection