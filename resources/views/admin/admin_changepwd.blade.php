@extends('admin.admin_master')

@section('content')
<section class="content">
<div class="row">

<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Change Password</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.change.password',$admin->id) }}" method="post" >
                        @csrf
					  <div class="row">
						<div class="col-12">						      
                                <div class="form-group">
								<h5>Current Password <span class="text-danger">*</span></h5>
								<div class="controls">
								 <input type="password" id="current_password" class="form-control" name="oldpwd">
                                 @error('oldpwd')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
							  </div>
                              <div class="form-group">
								<h5>New Password <span class="text-danger">*</span></h5>
								<div class="controls">
								 <input type="password" id="password" class="form-control"  name="pwd">
                                 @error('pwd')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
							  </div>
                              <div class="form-group">
								<h5>Confirm Password <span class="text-danger">*</span></h5>
								<div class="controls">
								 <input type="password" id="password_confirmation" class="form-control" name="pwd_confirmation">
                                 @error(' pwd_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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
@endsection