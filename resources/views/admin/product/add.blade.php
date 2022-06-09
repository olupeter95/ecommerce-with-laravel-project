@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content">
		  <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Add Product</h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('add.product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row"><!--- start first row --->
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Brand</label>
                                <select name="brand_id" class="form-control">
                                <option value="" selected="">Select Category</option>
                                    @foreach($brands as $bra)
                                    <option value="{{$bra->id}}">{{$bra->brand_name_en}}</option>
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
                                    <option value="{{$cat->id}}">{{$cat->category_name_en}}</option>
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
                                <option value="" selected="" disabled>Select SubCategory</option>
                                   
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
                                    
                                </select>
                                @error('subsubcategory_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Name En</label>
                                <input type="text" class="form-control" name="product_name_en" >
                                @error('product_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Name Fr</label>
                                <input type="text" class="form-control" name="product_name_fr" >
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
                                <input type="text" class="form-control" name="product_code" >
                                @error('product_code')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Quantity</label>
                                <input type="text" class="form-control" name="product_qty" >
                                @error('product_qty')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Tags En</label>
                                <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput" 
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
                                <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput"
                                 name="product_tags_fr"  class="form-control" />
                                @error('product_tags_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Size En</label>
                                <input type="text" value="small,medium,large" data-role="tagsinput" 
                                name="product_size_en"   class="form-control" />
                                @error('product_tags_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Size Fr</label>
                                <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput" 
                                name="product_size_fr"  class="form-control" />
                                @error('product_size_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                        </div><!---end fourth row --->


                        <div class="row"><!---start fifth row --->
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Color En</label>
                                <input type="text" value="Blue,Red,Black" data-role="tagsinput" name="product_color_en" 
                                class="form-control" />
                                @error('product_color_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Product Color Fr</label>
                                <input type="text" value="sac,orange,blur" data-role="tagsinput" 
                                name="product_color_fr" class="form-control" />
                                @error('product_color_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Selling Price</label>
                                <input type="text"  name="selling_price" class="form-control" />
                                @error('selling_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                        </div><!---end fifth row --->

                        
                        <div class="row"><!---start sixth row --->
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Discount Price</label>
                                <input type="text"  name="discount_price" class="form-control" />
                                @error('discount_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Main Thumbnail</label>
                                <input type="file"  name="product_thumbnail" class="form-control" 
                                onChange="mainThamUrl(this)">
                                @error('product_thumbnail')
                                <span class="text-danger">{{$message}}</span>
                                <img src=""  id="mainThmb">
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Multiple Image</label>
                                <input type="file"  name="photo_name[]" class="form-control" multiple
                                id="multiImg">
                                @error('photo_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="row" id="preview_img">

                                </div>
                            </div>
                            </div>
                        </div><!---end sixth row --->

                        <div class="row"><!---start seventh row --->
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Short Description En </label>
                                <textarea name="short_desc_en" class="form-control"></textarea>
                                @error('short_desc_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Short Description Fr</label>
                                <textarea  name="short_desc_fr" class="form-control"></textarea>
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
									This is my textarea to be replaced with CKEditor.
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
								This is my textarea to be replaced with CKEditor.
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
                                name="hot_deals" value="1">
                                <label class="form-check-label" for="exampleCheck1">Hot Deals</label>
                                </div>
                                </fieldset>
                                <fieldset>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2"
                                name="featured" value="1">
                                <label class="form-check-label" for="exampleCheck1">Featured</label>
                                </div>
                                </fieldset>
                            
                            </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" 
                                name="special_offer" value="1">
                                <label class="form-check-label" for="exampleCheck1">Special Offer</label>
                                </div>
                          </fieldset>
                          <fieldset>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4" 
                                name="special_deals" value="1">
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
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 
    });
    </script>
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