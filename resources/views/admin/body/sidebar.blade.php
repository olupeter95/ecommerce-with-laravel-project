@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp
<section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{  route('admin.body') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3> Admin Dashboard</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'admin.body') ? 'active':'' }}">
          <a href="{{  route('admin.body') }}" >
            <i data-feather="home" ></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ ($prefix == '/brand') ? 'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{  route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
            
          </ul>
        </li> 
		  
        <li class="treeview {{ ($prefix == '/category') ? 'active':'' }}">
          <a href="#">
            <i data-feather="layers"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{  route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
            <li><a href="{{  route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
            <li><a href="{{  route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub>subCategory</a></li>
          </ul>
        </li>
		
        <li class="treeview {{ ($prefix == '/product') ? 'active':'' }}">
          <a href="#">
            <i data-feather="shopping-cart"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{  route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
            <li><a href="{{  route('view.product') }}"><i class="ti-more"></i>Manage Product</a></li>
          </ul>
        </li>		 
        
        
        <li class="treeview {{ ($prefix == '/slider') ? 'active':'' }}">
          <a href="#">
            <i data-feather="sliders"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{  route('view.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li>		
		 
        <li class="treeview {{ ($prefix == '/coupon') ? 'active':'' }}">
          <a href="#">
            <i data-feather="gift"></i> <span>Coupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage.coupon') ? 'active':'' }}">
              <a href="{{  route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/shipping') ? 'active':'' }}">
          <a href="#">
            <i data-feather="truck"></i> <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-division') ? 'active':'' }}">
              <a href="{{  route('manage-division') }}"><i class="ti-more"></i>Ship Division</a>
            </li>
            <li class="{{ ($route == 'manage-district') ? 'active':'' }}">
              <a href="{{  route('manage-district') }}"><i class="ti-more"></i>Ship District</a>
            </li>
            <li class="{{ ($route == 'manage-state') ? 'active':'' }}">
              <a href="{{  route('manage-state') }}"><i class="ti-more"></i>Ship State</a>
            </li>
          </ul>
        </li>
        
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview {{ ($prefix == '/admin/orders') ? 'active':'' }}">
          <a href="#">
            <i data-feather="briefcase"></i> <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending-orders') ? 'active':'' }}">
              <a href="{{  route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a>
            </li>
            <li class="{{ ($route == 'manage-district') ? 'active':'' }}">
              <a href="{{  route('manage-district') }}"><i class="ti-more"></i>Ship District</a>
            </li>
            <li class="{{ ($route == 'manage-state') ? 'active':'' }}">
              <a href="{{  route('manage-state') }}"><i class="ti-more"></i>Ship State</a>
            </li>
          </ul>
        </li>
        
		 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>