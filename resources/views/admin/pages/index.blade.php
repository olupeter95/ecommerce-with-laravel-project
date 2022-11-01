@extends('admin.admin_master')

@section('content')
	<!-- Main content -->
    <section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body bg-info">							
							<div class="">
								<i class=" mr-0 fa fa-users fa-5x"></i>
							</div>
							<div>
								<p class="mt-20 mb-0 font-size-16">Total Users</p>
								<h3 class="text-white mb-0 font-weight-500">{{ count($users) }}</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body bg-success">							
							<div class="">
								<i class=" mr-0 fa fa-sign-in fa-5x"></i>
							</div>
							<div>
								<p class="mt-20 mb-0 font-size-16">Total Active Users</p>
								<h3 class="text-white mb-0 font-weight-500">
											@php
												$active = [];
												foreach($users as $user)
												{
													if($user->onlineUser()){
														$active[] = $user;
													}
												}
											@endphp
										 {{count($active)}}
								</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body bg-primary">							
							<div class="">
								<i class=" mr-0 fa fa-sign-out fa-5x"></i>
							</div>
							<div>
								<p class="mt-20 mb-0 font-size-16">Total Inactive Users</p>
								<h3 class="text-white mb-0 font-weight-500">
										@php
												$inactive = [];
												foreach($users as $user)
												{
													if(!$user->onlineUser()){
														$active[] = $user;
													}
												}
											@endphp
										 {{count($inactive)}}
								</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body bg-danger">							
							<div class="">
								<i class=" mr-0 fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<p class="mt-20 mb-0 font-size-16">Total Products</p>
								<h3 class="text-white mb-0 font-weight-500">{{ count($products) }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
</section>
		<!-- /.content -->
@endsection