<header class="header-style-1"> 

<!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
  <div class="container">
    <div class="header-top-inner">
      <div class="cnt-account">
        <ul class="list-unstyled">
          <li><a href="#"><i class="icon fa fa-user"></i>
          @if(session()->get('language') == 'french') Mon compte @else My Account @endif
          </a></li>
          <li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>
          @if(session()->get('language') == 'french') 
          Liste de souhaits @else
           Wishlist @endif
          </a></li>
          <li><a href="{{route('cart')}}"><i class="icon fa fa-shopping-cart"></i>
          @if(session()->get('language') == 'french') Mon panier @else My Cart @endif
        </a></li>
          <li><a href="{{route('checkout')}}"><i class="icon fa fa-check"></i>
          @if(session()->get('language') == 'french') Vérifier @else Checkout @endif
        </a></li>
          <li>
            @guest
            <a href="{{ route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a>
            @else
            <a href="{{ route('dashboard')}}"><i class="icon fa fa-user"></i>User Profile</a>
            @endguest
          </li>
        </ul>
      </div>
      <!-- /.cnt-account -->
      
      <div class="cnt-block">
        <ul class="list-unstyled list-inline">
          <li class="dropdown dropdown-small"> 
            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
              <span class="value">USD </span><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">USD</a></li>
              <li><a href="#">INR</a></li>
              <li><a href="#">GBP</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-small"> 
            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
            <span class="value">
            @if(session()->get('language') == 'french')
                Langue
              @else
              Language
              @endif
              </span><b class="caret"></b></a>
            <ul class="dropdown-menu">
              @if(session()->get('language') == 'french')
              <li><a href="{{ route('english.language') }}">English</a></li>
              @else
              <li><a href="{{ route('french.language') }}">French</a></li>
              @endif
            </ul>
          </li>
        </ul>
        <!-- /.list-unstyled --> 
      </div>
      <!-- /.cnt-cart -->
      <div class="clearfix"></div>
    </div>
    <!-- /.header-top-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.header-top --> 
<!-- ============================================== TOP MENU : END ============================================== -->
<div class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
        <!-- ============================================================= LOGO ============================================================= -->
        <div class="logo"> <a href="{{route('home')}}"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a> </div>
        <!-- /.logo --> 
        <!-- ============================================================= LOGO : END ============================================================= --> </div>
      <!-- /.logo-holder -->
      
      <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
        <!-- /.contact-row --> 
        <!-- ============================================================= SEARCH AREA ============================================================= -->
        <div class="search-area">
          <form>
            <div class="control-group">
              <ul class="categories-filter animate-dropdown">
                <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="">Categories <b class="caret"></b></a>
                  <ul class="dropdown-menu" role="menu" >
                  @php
                  $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                  @endphp
                  @foreach($categories as $cat)
                    <li role="presentation">
                      <a role="menuitem" tabindex="-1" href="{{route('search-product-by-category',[$cat->])}}">
                        @if(session()->get('language')=='french')
                          {{$cat->category_name_fr}}
                        @else
                          {{$cat->category_name_en}}
                        @endif
                      </a>
                    </li>
                  @endforeach
                  </ul>
                </li>
              </ul>
              <input class="search-field" placeholder="Search here..." />
              <a class="search-button" href="#" ></a> </div>
          </form>
        </div>
        <!-- /.search-area --> 
        <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
      <!-- /.top-search-holder -->
      
      <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
        <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
        
        <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
          <div class="items-cart-inner">
            <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
            <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
            <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price">
               <span class="sign">$</span><span class="value" id="cartSubTotal"></span> </span> </div>
          </div>
          </a>
          <ul class="dropdown-menu">
            <li>
              <!-- start add mini cart with ajax -->
              <div id="miniCart"></div>
              <!-- end start add mini cart with ajax -->
              
              <div class="clearfix cart-total">
                <div class="pull-right"> <span class="text">Sub Total :</span>
                <span class='price' id="cartSubTotal"></span> </div>
                <div class="clearfix"></div>
                <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
              <!-- /.cart-total--> 
              
            </li>
          </ul>
          <!-- /.dropdown-menu--> 
        </div>
        <!-- /.dropdown-cart --> 
        
        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
      <!-- /.top-cart-row --> 
    </div>
    <!-- /.row --> 
    
  </div>
  <!-- /.container --> 
  
</div>
<!-- /.main-header --> 

<!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
  <div class="container">
    <div class="yamm navbar navbar-default" role="navigation">
      <div class="navbar-header">
      <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
      <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="nav-bg-class">
        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
          <div class="nav-outer">
            <ul class="nav navbar-nav">
              <li class="active dropdown yamm-fw"> 
              <a href="{{route('home')}}" data-hover="dropdown" 
              class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
            <!--Get category menu -->
              @php
              $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
              @endphp
              
              @foreach($categories as $cat)
              <li class="dropdown yamm mega-menu"> 
              <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
              @if(session()->get('language')=='french')
                {{$cat->category_name_fr}}
              @else
               {{$cat->category_name_en}}
              @endif
              </a>
                <ul class="dropdown-menu container">
                  <li>
                    <div class="yamm-content ">
                      <div class="row">
              <!--Get subcategory menu -->
              @php
              $subcategories = App\Models\SubCategory::Where('category_id',$cat->id)->orderBy('subcategory_name_en','ASC')->get();
              @endphp

              @foreach($subcategories as $subcat)
                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                          <a href="{{route('subcat-product',[$subcat->id,$subcat->subcategory_slug_en])}}"><h2 class="title">
                          @if(session()->get('language') == 'french')
                          {{$subcat->subcategory_name_fr}}
                          @else
                          {{$subcat->subcategory_name_en}}
                          @endif
                          </h2>
                          </a>
                        
              @php
              $subsubcategories = App\Models\SubSubCategory::Where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
              @endphp
              @foreach($subsubcategories as $subsubcat)
                          <ul class="links">
                            <li><a href="{{route('subsubcat-product',[$subsubcat->id,$subsubcat->subsubcategory_slug_en])}}"> 
                           @if(session()->get('language') == 'french')
                          {{$subsubcat->subsubcategory_name_fr}}
                          @else
                          {{$subsubcat->subsubcategory_name_en}}
                          @endif
                        </a></li>
                          </ul>
                          @endforeach
                        </div>
                        @endforeach 
                        <!-- /.col -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> 
                          <img class="img-responsive" src="{{asset('frontend/assets/images/banners/top-menu-banner.jpg')}}" alt=""> 
                        </div>
                        <!-- /.yamm-content --> 
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              @endforeach
                  <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
            </ul>
            <!-- /.navbar-nav -->
            <div class="clearfix"></div>
          </div>
          <!-- /.nav-outer --> 
        </div>
        <!-- /.navbar-collapse --> 
        
      </div>
      <!-- /.nav-bg-class --> 
    </div>
    <!-- /.navbar-default --> 
  </div>
  <!-- /.container-class --> 
  
</div>
<!-- /.header-nav --> 
<!-- ============================================== NAVBAR : END ============================================== --> 

</header>