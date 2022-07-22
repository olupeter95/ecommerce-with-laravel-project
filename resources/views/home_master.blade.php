<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Meta -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
   <meta name="description" content="">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="author" content="">
   <meta name="keywords" content="MediaCenter, Template, eCommerce">
   <meta name="robots" content="all">
   <title>@yield('title')</title>

   <!-- Bootstrap Core CSS -->
   <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

   <!-- Customizable CSS -->
   <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


   <!-- Icons/Glyphs -->
   <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">


   <!-- Fonts -->
   <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
   <!-- ============================================== HEADER ============================================== -->
   @include('layouts.body.header')

   <!-- ============================================== HEADER : END ============================================== -->

   @yield('content')
   <!-- /#top-banner-and-menu -->

   <!-- Modal -->
   <div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               @if(session()->get('language') == 'french')
               <h5 class="modal-title" id="exampleModalLabel"><span id="pname_fr"></span></h5>
               @else
               <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
               @endif
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="card" style="width: 18rem;">
                        <img src=" " class="card-img-top" alt="..." style="200px; height:200px" id="pimage">

                     </div>
                  </div>
                  <!--end col--->
                  <div class="col-md-4">
                     <ul class="list-group">
                        <li class="list-group-item">Price: <strong class="text-danger"><span id="pprice">$</span></strong>
                           <del><span id="oldprice">$</span></del>
                        </li>
                        <li class="list-group-item">Product Code: <strong id="code"></strong></li>
                        @if(session()->get('language') == 'french')
                        <li class="list-group-item">Category: <strong id="category_fr"></strong></li>
                        @else
                        <li class="list-group-item">Category: <strong id="category"></strong></li>
                        @endif
                        @if(session()->get('language') == 'french')
                        <li class="list-group-item">Brand: <strong id="brand_fr"></strong></li>
                        @else
                        <li class="list-group-item">Brand: <strong id="brand"></strong></li>
                        @endif
                        <li class="list-group-item">Stock: <strong id="quantity"></strong></li>
                     </ul>
                  </div>
                  <!--end col--->
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleFormControlSelect1">Choose Color</label>
                        @if(session()->get('language') == 'french')
                        <select class="form-control" id="color_fr" name="color_fr"></select>
                        @else
                        <select class="form-control" id="color_en" name="color_en"></select>
                        @endif
                     </div>
                     <!--end formgroup--->

                     <div class="form-group" id="sizeArea">
                        <label for="exampleFormControlSelect1">Choose Size</label>
                        @if(session()->get('language') == 'french')
                        <select class="form-control" id="size_fr" name="size_fr"></select>
                        @else
                        <select class="form-control" id="size_en" name="size_en"></select>
                        @endif
                     </div>
                     <!--end formgroup--->

                     <div class="form-group">
                        <label for="quantity">Product Quantity</label>
                        <input type="number" class="form-control" value="1" min="1" id="qty">
                     </div>
                     <!--end formgroup--->
                     <input type="hidden" id="product_id">
                     <button type="submit" class="btn btn-primary mb-2" onclick="AddToCart()">Add To Cart</button>
                  </div>
                  <!--end col--->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!---- /end modal --->

   <!-- ============================================================= FOOTER ============================================================= -->
   @include('layouts.body.footer')
   <!-- ============================================================= FOOTER : END============================================================= -->

   <!-- For demo purposes – can be removed on production -->

   <!-- For demo purposes – can be removed on production : End -->

   <!-- JavaScripts placed at the end of the document so the pages load faster -->
   <script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
   <script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <script type="text/javascript">
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }

      });

      //start product view with modal
      function productView(id) {
         //alert(id)
         $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + id,
            dataType: 'json',
            success: function(data) {
               //console.log(data)
               $('#pname').text(data.product.product_name_en);
               $('#product_id').val(id);
               $('#pname_fr').text(data.product.product_name_fr);
               $('#code').text(data.product.product_code);
               $('#category').text(data.product.category.category_name_en);
               $('#category_fr').text(data.product.category.category_name_fr);;
               $('#brand').text(data.product.brand.brand_name_en);
               $('#brand_fr').text(data.product.brand.brand_name_fr);
               $('#qty').val(1);
               $('#pimage').attr('src', 'storage/upload/product/thumbnail/' + data.product.product_thumbnail);


               // Color english
               $('select[name="color_en"]').empty();
               $.each(data.color_en, function(key, value) {
                  $('select[name="color_en"]').append('<option value=" ' + value + ' ">' + value + ' </option>');
               }) // end color english

               // Color french
               $('select[name="color_fr"]').empty();
               $.each(data.color_fr, function(key, value) {
                  $('select[name="color_fr"]').append('<option value=" ' + value + ' ">' + value + ' </option>');
               }) // end color french

               // Size
               $('select[name="size_en"]').empty();
               $.each(data.size_en, function(key, value) {
                  $('select[name="size_en"]').append('<option value=" ' + value + ' ">' + value + ' </option>');
                  if (data.size == "") {
                     $('#sizeArea').hide();
                  } else {
                     $('#sizeArea').show();
                  }
               }) // end size

               // Size french
               $('select[name="size_fr"]').empty();
               $.each(data.size_fr, function(key, value) {
                  $('select[name="size_fr"]').append('<option value=" ' + value + ' ">' + value + ' </option>');
                  if (data.size == "") {
                     $('#sizeArea').hide();
                  } else {
                     $('#sizeArea').show();
                  }
               }) // end size french
               //product price
               if (data.product.discount_price == null) {
                  $('#pprice').text('');
                  $('#pprice').text('');
                  $('#pprice').text(data.product.selling_price);
               } else {
                  $('#pprice').text(data.product.discount_price);
                  $('#oldprice').text(data.product.selling_price);
               }

               //stock
               if (data.product.product_qty > 0) {
                  $('#qty').text('');
                  $('#qty').text('Available');
               } else {
                  $('#qty').text('');
                  $('#qty').text('Out Of Stock');
               }
            }
         });
         //End product modal view//
      }



      //Start Add to Cart product
      function AddToCart() {
         var product_name = $('#pname').text();
         var product_name_fr = $('#pname_fr').text();
         var id = $('#product_id').val();
         var color_en = $('#color_en option:selected').text();
         var color_fr = $('#color_fr option:selected').text();
         var product_price = $('#pprice').text();
         var size_en = $('#size_en option:selected').text();
         var size_fr = $('#size_fr option:selected').text();
         var qty = $('#qty').val();

         $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/product/add/cart/' + id,
            data: {
               product_name: product_name,
               product_name_fr: product_name_fr,
               color_en: color_en,
               color_fr: color_fr,
               product_price: product_price,
               size_en: size_en,
               size_fr: size_fr,
               qty: qty
            },
            success: function(data) {
               miniCart()
               $('#closeModal').click();
               //console.log(data)

               //start message
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     title: data.success
                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     title: data.error
                  })
               }
               //end message

            }

         })

      }
      //End Add to Cart product  
   </script>


<script type="text/javascript">
   function miniCart(){
      $.ajax({
         type:'GET',
         url:'/product/mini/cart',
         dataType:'json',
         success:function(response){

            $('#cartQty').text(response.qty)
            $('span[id="cartSubTotal"]').text(response.total)
            var miniCart = ""
            $.each(response.carts,function(key,value){
               miniCart += `<div class="cart-item product-summary">
                <div class="row">
                  <div class="col-xs-4">
                    <div class="image"> <a href="detail.html">
                      <img src="/storage/upload/product/thumbnail/${value.options.image}" alt=""></a> </div>
                  </div>
                  <div class="col-xs-7">
                    <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                    <div class="price">${value.price} * ${value.qty} </div>
                  </div>
                  <div class="col-xs-1 action"> 
                  <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> 
                  </div>
                </div>
              </div>
              <!-- /.cart-item -->
              <div class="clearfix"></div>
              <hr>`
            })

            $('#miniCart').html(miniCart);
         }
      })
   }
 miniCart();

 //start miniCartRemove

 function miniCartRemove(rowId){
      $.ajax({
         type:'GET',
         url:'/remove/product/minicart/'+rowId,
         dataType:'json',
         success: function(data) {
               miniCart()
               $('#closeModal').click();
               //console.log(data)

               //start message
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     title: data.success
                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     title: data.error
                  })
               }
               //end message

            }

      })
 }
//end miniCartRemove
</script>


<script type="text/javascript" >
   //add my wishlist
     function addMyWishlist(id){
         $.ajax({
            type:'POST',
            url:'/add/product/wishlist/'+id,
            dataType:'json',
            success: function(data){
               console.log(data)
               
               //start message
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success
                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error
                  })
               }
               //end message
            }
         })
     }
     //end add my wishlist
</script>




   <script>
      if (Session::has('message'))
         var type = "{{ Session::get('alert-type','info') }}"
      switch (type) {
         case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

         case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

         case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

         case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
      }
      endif
   </script>
</body>

</html>