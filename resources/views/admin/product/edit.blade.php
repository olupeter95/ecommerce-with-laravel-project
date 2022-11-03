@extends('admin.admin_master')
@section('content')
<section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">Edit Product</h3>
                <div class="card-body">
                    <form method="post" action="{{ route('update.product') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$products->id}}">
                    <div class="row"><!--- start first row --->
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Brand</label>
                            <select name="brand_id" class="form-control">
                            <option value="" selected="">Select Category</option>
                                @foreach($brands as $bra)
                                <option value="{{$bra->id}}" 
                                {{$bra->id == $products->brand_id ? 'selected' : '' }}>{{$bra->brand_name_en}}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control">
                            <option value="" selected="">Select Category</option>
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}"
                                {{$cat->id == $products->category_id ? 'selected' : ' ' }}>{{$cat->category_name_en}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">SubCategory</label>
                            <select name="subcategory_id" class="form-control">
                            <option value="" selected="" >Select SubCategory</option>
                            @foreach($subcategories as $subcat)
                                <option value="{{$subcat->id}}"
                                {{$subcat->id == $products->subcategory_id ? 'selected' : ' ' }}>{{$subcat->subcategory_name_en}}</option>
                                @endforeach
                            </select>
                                
                            </select>
                            @error('subcategory_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                    </div><!---end first row --->

                    <div class="row"><!---start second row --->
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">SubSubCategory</label>
                            <select name="subsubcategory_id" class="form-control">
                            <option value="" selected="">Select SubSubCategory</option>
                            @foreach($subsubcategories as $subsubcat)
                                <option value="{{$subsubcat->id}}"
                                {{$subsubcat->id == $products->subsubcategory_id ? 'selected' : ' ' }}>{{$subsubcat->subsubcategory_name_en}}</option>
                                @endforeach
                            </select>   
                            </select>
                            @error('subsubcategory_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Name En</label>
                            <input type="text" class="form-control" name="product_name_en"
                                value="{{$products->product_name_en}}">
                            @error('product_name_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Name Fr</label>
                            <input type="text" class="form-control" name="product_name_fr"
                            value="{{$products->product_name_fr}}" >
                            @error('product_name_fr')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                    </div><!---end second row --->


                    
                    <div class="row"><!---start third row --->
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Code</label>
                            <input type="text" class="form-control" name="product_code" 
                            value="{{$products->product_code}}">
                            @error('product_code')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Quantity</label>
                            <input type="text" class="form-control" name="product_qty"
                            value="{{$products->product_qty}}" >
                            @error('product_qty')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Tags En</label>
                            <input type="text" value="{{$products->product_tags_en}}" data-role="tagsinput" 
                            name="product_tags_en"  class="form-control" />
                            @error('product_tags_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                    </div><!---end third row --->


                    
                    
                    <div class="row"><!---start fourth row --->
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Tags Fr</label>
                            <input type="text" value="{{$products->product_tags_fr}}" data-role="tagsinput"
                                name="product_tags_fr"  class="form-control" />
                            @error('product_tags_fr')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Size En</label>
                            <input type="text" value="{{$products->product_size_en}}" data-role="tagsinput" 
                            name="product_size_en"   class="form-control" >
                            @error('product_tags_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Product Size Fr</label>
                            <input type="text" value="{{$products->product_size_fr}}" data-role="tagsinput" 
                            name="product_size_fr"  class="form-control" >
                            @error('product_size_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                    </div><!---end fourth row --->


                    <div class="row"><!---start fifth row --->
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Product Color En</label>
                            <input type="text" value="{{$products->product_color_en}}" data-role="tagsinput" name="product_color_en" 
                            class="form-control" />
                            @error('product_color_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Product Color Fr</label>
                            <input type="text" value="{{$products->product_color_fr}}" data-role="tagsinput" 
                            name="product_color_fr" class="form-control" />
                            @error('product_color_fr')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        
                    </div><!---end fifth row --->

                    
                    <div class="row"><!---start sixth row --->
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Discount Price</label>
                            <input type="text"  name="discount_price" class="form-control" value="{{$products->discount_price}}">
                            @error('discount_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Selling Price</label>
                            <input type="text"  name="selling_price" class="form-control" value="{{$products->selling_price}}">
                            @error('selling_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        
                    </div><!---end sixth row --->

                    <div class="row"><!---start seventh row --->
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Short Description En </label>
                            <textarea name="short_desc_en" class="form-control">{{$products->short_desc_en}}</textarea>
                            @error('short_desc_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Short Description Fr</label>
                            <textarea  name="short_desc_fr" class="form-control">{{$products->short_desc_fr}}</textarea>
                            @error('short_desc_fr')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                    </div><!---end seventh row --->

                    
                    <div class="row"><!---start eighth row --->
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Description En </label>
                            <textarea id="editor1" name="description_en" rows="10" cols="80" class="form-control">
                            {{$products->description_en}}
                            </textarea>
                            @error('long_desc_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Description Fr</label>
                            <textarea id="editor2" name="description_fr" class="form-control" rows="10" cols="80">
                            {{$products->description_fr}}
                            </textarea>
                            @error('long_desc_fr')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                    </div><!---end eighth row --->

                    <hr>

                    <div class="row">
                        <div class="col-md-6">

                        <div class="form-check">
                                <input class="form-check-input" type="checkbox"  name="hot_deals" id="defaultCheck1" 
                                 value="1" {{ $products->hot_deals == 1 ? 'checked' : ''}} >
                                <label class="form-check-label" for="defaultCheck1" >
                                Hot Deals
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="featured"
                                 id="defaultCheck2" {{ $products->featured == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="defaultCheck2" >
                                Featured
                                </label>
                            </div>
                        
                        </div>
                    <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="special_offer" value="1"
                        id="defaultCheck3" {{ $products->special_offer == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="defaultCheck3" >
                        Special Offer
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="special_deals" value="1"
                        id="defaultCheck4" {{ $products->special_deals == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="defaultCheck4" >
                        Special Deals
                        </label>
                        </div>
                    </div>
                        
                    </div>
                    <button type="submit" class="btn btn-info ">Update Product Data</button>

                    </form>
                    
                </div>
            </div><!--- end card --->
        </div><!--- end col --->
</div> <!--- end row --->
</section>


<!-------Multiple Image Update area--------->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box bl-3 border-primary">
                <div class="box-header">
                    <h4 class="box-title"> <strong>Product Multiple Image Update</strong></h4>
                </div>

                <form action="{{route('update.product-img')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row row-sm ">
                    @foreach($multiImg as $img)
                        <div class="col-md-3 p-4">
                            <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/upload/product/image/'.$img->photo_name) }}" 
                            class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('product-del-multiimg',$img->id)}}" id="delete" title="Delete Data" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i></a>
                                </h5>
                                <p class="card-text">
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                        <input type="file" class="form-group" name="photo_name[{{$img->id}}]">
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        <div class="text-xs-right px-2">
            <input type="submit" class="btn btn-primary" value="Update Image">
        </div>
        <br>
    </form>
    
  </div>
 </div>
</div>
</section>
<!-------End Multiple Image Update area--------->



<!-------Thumbnail  Image Update area--------->
<section class="content">
    <div class="row">



<div class="col-md-12">
  <div class="box bl-3 border-primary">
    <div class="box-header">
      <h4 class="box-title"> <strong>Product Thumbnail  Image Update</strong></h4>
    </div>

    <form action="{{route('update.product-thumbnail')}}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $products->id }}">
        <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">
        <div class="row row-sm ">
            <div class="col-md-3 p-4">
            <div class="card" style="width: 18rem;">
             <img src="{{ asset('storage/upload/product/thumbnail/'.$products->product_thumbnail) }}" 
                class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">
                <div class="form-group">
                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                    <input type="file"  name="product_thumbnail" class="form-control" 
                                onChange="mainThamUrl(this)">
                                @error('product_thumbnail')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <br>
                                <img src=""  id="mainThmb">
                </div>
            </p>
           
        </div>
    </div>
                
            </div>
        </div>
        <div class="text-xs-right px-2">
            <input type="submit" class="btn btn-primary" value="Update Image">
        </div>
        <br>
    </form>
    
  </div>
 </div>
</div>
</section>
<!-------End Thumbnail Image Update area--------->

<script type="text/javascript">
function mainThamUrl(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}	
</script>
@endsection 