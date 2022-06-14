@extends('admin.admin_master')
@section('content')
<section class="content">
		  <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Product</h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row"><!--- start first row --->
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Brand</label>
                                <select name="brand_id" class="form-control">
                                <option value="" selected="">Select Category</option>
                                    @foreach($brands as $bra)
                                    <option value="{{$bra->id}}" 
                                    {{$bra->id == $products->brand_id ? 'selected' : ' ' }}>{{$bra->brand_name_en}}</option>
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
                                <label for="category">Long Description En </label>
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
                                <label for="category">Long Description Fr</label>
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
                                <fieldset>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                name="hot_deals" value="1" {{$products->hot_deals == 1 ? 'checked': '' }}>
                                <label class="form-check-label" for="exampleCheck1">Hot Deals</label>
                                </div>
                                </fieldset>
                                <fieldset>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2"
                                name="featured" value="1" {{$products->featured == 1 ? 'checked': '' }}>
                                <label class="form-check-label" for="exampleCheck1">Featured</label>
                                </div>
                                </fieldset>
                            
                            </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" 
                                name="special_offer" value="1" {{$products->special_offer == 1 ? 'checked': '' }}>
                                <label class="form-check-label" for="exampleCheck1">Special Offer</label>
                                </div>
                          </fieldset>
                          <fieldset>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4" 
                                name="special_deals" value="1" {{$products->special_deals == 1 ? 'checked': '' }}>
                                <label class="form-check-label" for="exampleCheck1">Special Deals</label>
                                </div>
                            </fieldset>

                        </div>
                            
                        </div>
                        <button type="submit" class="btn btn-info ">Add Product</button>

                        </form>
                        
                    </div>
                </div><!--- end card --->
            </div><!--- end col --->
</div> <!--- end row --->


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

<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

</section>

@endsection 