@extends('home_master')
@section('content')
@section('title')
Product Tags
@endsection
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{route('home')}}">Home</a></li>
        <li class='active'>Product</li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('layouts.body.catsidebar')
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                  @php 
                  $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                  @endphp
                  @foreach($categories as $cat)
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseOne{{$cat->id}}" data-toggle="collapse" class="accordion-toggle collapsed"> 
                    @if(session()->get('language')=='french')
                      {{$cat->category_name_fr}}
                    @else
                      {{$cat->category_name_en}}
                    @endif      
                  </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseOne{{$cat->id}}" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
            @php
            $subcategories = App\Models\SubCategory::Where('category_id',$cat->id)->orderBy('subcategory_name_en','ASC')->get();
            @endphp
            @foreach($subcategories as $subcat)
                          <li><a href="{{route('subcat-product',[$subcat->id,$subcat->subcategory_slug_en])}}">
                          @if(session()->get('language') == 'french')
                        {{$subcat->subcategory_name_fr}}
                        @else
                        {{$subcat->subcategory_name_en}}
                        @endif
                          </a></li>
            @endforeach              
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                 
                  @endforeach
                </div>
                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder --> 
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            <!-- ============================================== MANUFACTURES============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Manufactures</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  @php 
                  $brands = App\Models\Brand::orderBy('brand_name_en','ASC')->get();
                  @endphp
                  @foreach($brands as $brand)
                  <li><a href="#">
                    @if(session()->get('language') == 'french')
                        {{$brand->brand_name_fr}}
                    @else
                        {{$brand->brand_name_en}}
                    @endif
                  </a></li>
                  @endforeach
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== MANUFACTURES: END ============================================== --> 
            <!-- ============================================== COLOR============================================== -->
          
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COLOR: END ============================================== --> 
            <!-- ============================================== COMPARE============================================== -->
            <div class="sidebar-widget wow fadeInUp outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COMPARE: END ============================================== --> 
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            @include('layouts.body.tag')
            <!-- /.sidebar-widget --> 
          <!----------- Testimonials------------->
          @include('layouts.body.testimonial')
            
            <!-- ============================================== Testimonials: END ============================================== -->
            
            <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="{{asset('frontend/assets/images/banners/cat-banner-1.jpg')}}" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
        </div>
     <!-- ========================================== SECTION – HERO- END ========================================= -->
            
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
            {{$products->links()}} 
           </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        
        <div class="search-result-container ">
        
          <div id="myTabContent" class="tab-content category-list">
          
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                @forelse($products as $prod)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{route('product-details',$prod->id)}}">
                            <img  src="{{asset('storage/upload/product/thumbnail/'.$prod->product_thumbnail)}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          @php 
                          $amount = $prod->selling_price - $prod->discount_price;
                          $discount = ($amount/$prod->discount_price) * 100;
                          @endphp
                          <div>
                            @if($prod->discount_price == NULL)
                            <div class="tag new"><span>new</span></div>
                            @else
                            <div class="tag hot"><span>{{round($discount)}}%</span></div>
                            @endif
                          </div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">
                          @if(session()->get('language') == 'french')
                            {{$prod->product_name_fr}}
                            @else
                            {{$prod->product_name_en}}
                            @endif
                          </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> 
                          @if($prod->discount_price == NULL)
                          <div class="product-price">
                          <span class="price-before-discount">${{$prod->selling_price}}</span>
                          </div>
                          @else   
                          <div class="product-price"> <span class="price"> ${{$prod->discount_price}} </span> 
                          <span class="price-before-discount">${{$prod->selling_price}}</span> </div>
                          @endif                       
                        </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @empty
                  <span class="text-danger">No Product Found</span>
                  @endforelse
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            

            <div class="tab-pane "  id="list-container">
              <div class="category-product">
              @forelse($products as $prod)
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">

                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <img src="{{asset('storage/upload/product/thumbnail/'.$prod->product_thumbnail)}}" alt=""> </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="detail.html">
                            @if(session()->get('language') == 'french')
                            {{$prod->product_name_fr}}
                            @else
                            {{$prod->product_name_en}}
                            @endif
                            </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> 
                          @php 
                          $amount = $prod->selling_price - $prod->discount_price;
                          $discount = ($amount/$prod->discount_price) * 100;
                          @endphp
                            @if($prod->discount_price == NULL)
                          <div class="product-price">
                          <span class="price-before-discount">${{$prod->selling_price}}</span>
                          </div>
                          @else   
                          <div class="product-price"> <span class="price"> ${{$prod->discount_price}} </span> 
                          <span class="price-before-discount">${{$prod->selling_price}}</span> </div>
                          @endif
                             </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10">
                            @if(session()->get('language') == 'french')
                            {{$prod->description_fr}}
                            @else
                            {{$prod->description_en}}
                            @endif   <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-list-row -->
                      
                          <div>
                            @if($prod->discount_price == NULL)
                            <div class="tag new"><span>new</span></div>
                            @else
                            <div class="tag hot"><span>{{round($discount)}}%</span></div>
                            @endif
                          </div>
                        </div>
                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.category-product-inner -->
                @empty
                <span class="text-danger">No Product Found</span>
               @endforelse
                
              </div>
              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
   
          </div>
          
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
             {{$products->links()}} 
            </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
</div>








</div>
   <!-- ============================================== BRANDS CAROUSEL ============================================== -->
   @include('layouts.body.brand')
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
 
</div>
</div>


@endsection