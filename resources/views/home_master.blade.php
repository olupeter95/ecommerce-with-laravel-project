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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  

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

<script type="text/javascript">
$.ajaxSetup({
   headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
   }

})

   //start product view with modal
   function productView(id){
         //alert(id)
         $.ajax({
            type:'GET',
            url:'/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
               //console.log(data)
               $('#pname').text(data.product.product_name_en)
              // $('#price').text(data.product.selling_price)
               $('#pname_fr').text(data.product.product_name_fr)
               $('#price').text(data.product.selling_price)
               $('#code').text(data.product.product_code)
               $('#category').text(data.product.category.category_name_en)
               $('#category_fr').text(data.product.category.category_name_fr)
               $('#brand').text(data.product.brand.brand_name_en)
               $('#brand_fr').text(data.product.brand.brand_name_fr)
               $('#quantity').text(data.product.product_qty)
               $('#pimage').attr('src','storage/upload/product/thumbnail/'+data.product.product_thumbnail)
               

               // Color english
              $('select[name="color_en"]').empty();        
               $.each(data.color_en,function(key,value){
                  $('select[name="color_en"]').append('<option value=" '+value+' ">'+value+' </option>')
               }) // end color english

                 // Color french
               $('select[name="color_fr"]').empty();        
              $.each(data.color_fr,function(key,value){
                  $('select[name="color_fr"]').append('<option value=" '+value+' ">'+value+' </option>')
               }) // end color french

                  // Size
               $('select[name="size_en"]').empty();        
               $.each(data.size_en,function(key,value){
                  $('select[name="size_en"]').append('<option value=" '+value+' ">'+value+' </option>')
                  if (data.size == "") {
                        $('#sizeArea').hide();
                  }else{
                        $('#sizeArea').show();
                  }
               }) // end size
               
                  // Size french
                $('select[name="size_fr"]').empty();        
               $.each(data.size_fr,function(key,value){
                  $('select[name="size_fr"]').append('<option value=" '+value+' ">'+value+' </option>')
                  if (data.size == "") {
                        $('#sizeArea').hide();
                  }else{
                        $('#sizeArea').show();
                  }
               }) // end size french
               //product price
               if(data.product.discount_price == null){
                     $('#pprice').text('');
                     $('#pprice').text('');
                     $('#pprice').text(data.product.selling_price);
                  }else{
                     $('#pprice').text(data.product.discount_price);
                     $('#oldprice').text(data.product.selling_price);
                  }

               //stock
               if(data.product.product_qty > 0){
                     $('#quantity').text('');
                     $('#quantity').text('Available');
               }else{
                  $('#quantity').text('');
                  $('#quantity').text('Out Of Stock');
               }
            }
         })
   }  
</script>







<script>
 if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
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