@php 
$tag_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tag_fr = App\Models\Product::groupBy('product_tags_fr')->select('product_tags_fr')->get();
@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
        <h3 class="section-title">Product tags</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <div class="tag-list"> 
            @if(session()->get('language')=='french')
            @foreach($tag_fr as $tag)
            <a class="item active"  href="{{route('product-tags',$tag->product_tags_fr)}}">{{ str_replace(',','',$tag->product_tags_fr)}}</a> 
            @endforeach
            @else
            @foreach($tag_en as $tag)
            <a class="item active"  href="{{route('product-tags',$tag->product_tags_en)}}">{{str_replace(',','',$tag->product_tags_en)}}</a> 
            @endforeach
            @endif
        </div>
          <!-- /.tag-list --> 
        </div>
        <!-- /.sidebar-widget-body --> 
      </div>