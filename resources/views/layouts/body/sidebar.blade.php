<div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
      
      <!-- ================================== TOP NAVIGATION ================================== -->
      <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
        <nav class="yamm megamenu-horizontal">
          <ul class="nav">
  @php
    $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
  @endphp
  @foreach($categories as $cat)
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon {{$cat->category_icon}}" aria-hidden="true"></i>
              @if(session()->get('language')=='french')
                {{$cat->category_name_fr}}
              @else
                {{$cat->category_name_en}}
              @endif  
            </a>
              <ul class="dropdown-menu mega-menu">
                <li class="yamm-content">
                  <div class="row">
            @php
            $subcategories = App\Models\SubCategory::Where('category_id',$cat->id)->orderBy('subcategory_name_en','ASC')->get();
            @endphp
            @foreach($subcategories as $subcat)
                    <div class="col-sm-12 col-md-3">
                    <h2 class="title">
                        @if(session()->get('language') == 'french')
                        {{$subcat->subcategory_name_fr}}
                        @else
                        {{$subcat->subcategory_name_en}}
                        @endif
                    </h2>
              @php
            $subsubcategories = App\Models\SubSubCategory::Where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
            @endphp
            @foreach($subsubcategories as $subsubcat)
                      <ul class="links list-unstyled">
                        <li><a href="#">
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
                    <!-- /.col --> 
                  </div>
                  <!-- /.row --> 
                </li>
                <!-- /.yamm-content -->
              </ul>
              <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->
            

            <!-- /.menu-item -->
          
            @endforeach
          </ul>
          
          <!-- /.nav --> 
        </nav>
        <!-- /.megamenu-horizontal --> 
      </div>
      <!-- /.side-menu --> 
      <!-- ================================== TOP NAVIGATION : END ================================== --> 
      
      <!-- ============================================== HOT DEALS ============================================== -->
      <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
        <h3 class="section-title">hot deals</h3>
        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
          @php 
          $hot_deals = App\Models\Product::where('hot_deals',1)->orderBy('id','DESC')->get();
          @endphp
          @forelse($hot_deals as $hot_deal)
          <div class="item">
            <div class="products">
              <div class="hot-deal-wrapper">
                <div class="image"> 
                  <img src="{{asset('storage/upload/product/thumbnail/'.$hot_deal->product_thumbnail)}}" alt=""> </div>
                @php 
                $amount = $hot_deal->selling_price - $hot_deal->discount_price;
                $discount = ($amount/$hot_deal->discount_price) * 100;
                @endphp
                @if($hot_deal->discount_price == NULL)
                <div class="tag new">{{$hot_deal->selling_price}}<span>new</span></div>
                @else
                <div class="sale-offer-tag">
                  <span>{{$discount}}%<br>off</span>
                </div>
                @endif
                <div class="timing-wrapper">
                  <div class="box-wrapper">
                    <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                  </div>
                  <div class="box-wrapper">
                    <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                  </div>
                  <div class="box-wrapper">
                    <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                  </div>
                  <div class="box-wrapper hidden-md">
                    <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                  </div>
                </div>
              </div>
              <!-- /.hot-deal-wrapper -->
              
              <div class="product-info text-left m-t-20">
                <h3 class="name"><a href="{{route('product.details',$hot_deal->id)}}">
                  @if(session()->get('language')=='french')
                  {{$hot_deal->product_name_fr}}
                  @else
                  {{$hot_deal->product_name_en}}
                  @endif
                </a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price">
                @if($hot_deal->discount_price == NULL)  
                <span class="price-before-discount">{{$hot_deal->selling_price}}</span>
                @else
                   <span class="price"> {{$hot_deal->discount_price}} </span> 
                   <span class="price-before-discount">{{$hot_deal->selling_price}}</span>
                  @endif </div>
                <!-- /.product-price --> 
                
              </div>
              <!-- /.product-info -->
              
              <div class="cart clearfix animate-effect">
                <div class="action">
                  <div class="add-cart-button btn-group">
                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                  </div>
                </div>
                <!-- /.action --> 
              </div>
              <!-- /.cart --> 
            </div>
          </div>
          @empty
          <div class="text-danger">
            <h5>No Product Data</h5>
          </div>
         @endforelse
        </div>
        <!-- /.sidebar-widget --> 
      </div>
      <!-- ============================================== HOT DEALS: END ============================================== --> 
      
      <!-- ============================================== SPECIAL OFFER ============================================== -->
      
      <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Offer</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        @php 
        $special_offers = App\Models\Product::where('special_offer',1)->orderBy('id','DESC')->get();
        @endphp
        @forelse($special_offers as $special_offer)
          <div class="item">
            
              <div class="products special-product">
              
                <div class="product">
                  <div class="product-micro">
                    <div class="row product-micro-row">
                      <div class="col col-xs-5">
                        <div class="product-image">
                          <div class="image"> <a href="{{route('product.details',$special_offer->id)}}"> 
                            <img src="{{asset('storage/upload/product/thumbnail/'.$special_offer->product_thumbnail)}}" alt=""> 
                          </a> 
                        </div>
                          <!-- /.image --> 
                          
                        </div>
                        <!-- /.product-image --> 
                      </div>
                      <!-- /.col -->
                      <div class="col col-xs-7">
                        <div class="product-info">
                          <h3 class="name"><a href="#">
                          @if(session()->get('language')=='french')
                            {{$special_offer->product_name_fr}}
                            @else
                            {{$special_offer->product_name_en}}
                            @endif
                          </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="product-price"> <span class="price"> ${{$special_offer->selling_price}} </span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                      </div>
                      <!-- /.col --> 
                    </div>
                    <!-- /.product-micro-row --> 
                  </div>
                  <!-- /.product-micro --> 
                </div>
                   
              </div>
              
            </div>
            @empty
           <div class="text-danger">
            <h5>No Product Data</h5>
          </div>
          </div><!-- /.items --> 
          @endforelse
        </div>
        <!-- /.sidebar-widget-body --> 
      </div>
      <!-- /.sidebar-widget --> 
      <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
      <!-- ============================================== PRODUCT TAGS ============================================== -->
      <div class="sidebar-widget product-tag wow fadeInUp">
        <h3 class="section-title">Product tags</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone" href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a> </div>
          <!-- /.tag-list --> 
        </div>
        <!-- /.sidebar-widget-body --> 
      </div>
      <!-- /.sidebar-widget --> 
      <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
      <!-- ============================================== SPECIAL DEALS ============================================== -->
      
      <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Deals</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
          @php 
          $special_deals = App\Models\Product::where('special_deals',1)->orderBy('id','DESC')->get();
          @endphp
          @forelse($special_deals as $special_deal)
          <div class="item">
              <div class="products special-product">
                <div class="product">
                  <div class="product-micro">
                    <div class="row product-micro-row">
                      <div class="col col-xs-5">
                        <div class="product-image">
                          <div class="image"> <a href="{{route('product.details',$special_deal->id)}}"> 
                            <img src="{{asset('storage/upload/product/thumbnail/'.$special_deal->product_thumbnail)}}"  alt=""> 
                          </a> 
                        </div>
                          <!-- /.image --> 
                          
                        </div>
                        <!-- /.product-image --> 
                      </div>
                      <!-- /.col -->
                      <div class="col col-xs-7">
                        <div class="product-info">
                          <h3 class="name"><a href="#">
                            @if(session()->get('language')=='french')
                            {{$special_deal->product_name_fr}}
                            @else
                            {{$special_deal->product_name_en}}
                            @endif
                          </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="product-price"> 
                            <span class="price"> ${{$special_deal->selling_price}}</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                      </div>
                      <!-- /.col --> 
                    </div>
                    <!-- /.product-micro-row --> 
                  </div>
                  <!-- /.product-micro --> 
                  
                </div>
                
                
              </div>
              
            </div>
            @empty
              <div class="text-danger">
                <h5>No Product Data</h5>
              </div>
          </div>
          @endforelse
        </div>
        <!-- /.sidebar-widget-body --> 
      </div>
      <!-- /.sidebar-widget --> 
      <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
      <!-- ============================================== NEWSLETTER ============================================== -->
      <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
        <h3 class="section-title">Newsletters</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <p>Sign Up for Our Newsletter!</p>
          <form>
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
            </div>
            <button class="btn btn-primary">Subscribe</button>
          </form>
        </div>
        <!-- /.sidebar-widget-body --> 
      </div>
      <!-- /.sidebar-widget --> 
      <!-- ============================================== NEWSLETTER: END ============================================== --> 
      
      <!-- ============================================== Testimonials============================================== -->
      <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
        <div id="advertisement" class="advertisement">
          <div class="item">
            <div class="avatar"><img src="{{asset('frontend/assets/images/testimonials/member1.png')}}" alt="Image"></div>
            <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
            <div class="clients_author">John Doe <span>Abc Company</span> </div>
            <!-- /.container-fluid --> 
          </div>
          <!-- /.item -->
          
          <div class="item">
            <div class="avatar"><img src="{{asset('frontend/assets/images/testimonials/member3.png')}}" alt="Image"></div>
            <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
            <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
          </div>
          <!-- /.item -->
          
          <div class="item">
            <div class="avatar"><img src="{{asset('frontend/assets/images/testimonials/member2.png')}}" alt="Image"></div>
            <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
            <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
            <!-- /.container-fluid --> 
          </div>
          <!-- /.item --> 
          
        </div>
        <!-- /.owl-carousel --> 
      </div>
      
      <!-- ============================================== Testimonials: END ============================================== -->
      
      <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
    </div>