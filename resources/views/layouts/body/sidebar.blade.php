<div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
      
      <!-- ================================== TOP NAVIGATION ================================== -->
@include('layouts.body.catsidebar') 
      <!-- ================================== TOP NAVIGATION : END ================================== --> 
      
      <!-- ============================================== HOT DEALS ============================================== -->
      @include('layouts.body.hotdeals_cat')
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
                          <div class="image"> <a href="{{route('product-details',$special_offer->id)}}"> 
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
        </div>
        <!-- /.sidebar-widget-body --> 
      </div>
      <!-- /.sidebar-widget --> 
      <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
      <!-- ============================================== PRODUCT TAGS ============================================== -->
      @include('layouts.body.tag')
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
                          <div class="image"> <a href="{{route('product-details',$special_deal->id)}}"> 
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
      @include('layouts.body.testimonial')
      
      <!-- ============================================== Testimonials: END ============================================== -->
      
      <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
    </div>