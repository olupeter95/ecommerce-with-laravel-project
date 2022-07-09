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
              <div class="image"> <img src="{{asset('storage/upload/product/thumbnail/'.$hot_deal->product_thumbnail)}}" alt=""> </div>
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
              <h3 class="name">
                <a href="detail.html">
                  @if(session()->get('language')=='french')
                  {{$hot_deal->product_name_fr}}
                  @else
                  {{$hot_deal->product_name_en}}
                  @endif
                </a>
              </h3>
              <div class="rating rateit-small"></div>
              <div class="product-price">
                @if($hot_deal->discount_price == NULL)  
                <span class="price-before-discount">{{$hot_deal->selling_price}}</span>
                @else
                <span class="price"> {{$hot_deal->discount_price}} </span> 
                <span class="price-before-discount">{{$hot_deal->selling_price}}</span>
                @endif 
            </div>
              <!-- /.product-price --> 
              
            </div>
            <!-- /.product-info -->
            
            <div class="cart clearfix animate-effect">
              <div class="action">
                <div class="add-cart-button btn-group">
                  <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                     <i class="fa fa-shopping-cart"></i> </button>
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