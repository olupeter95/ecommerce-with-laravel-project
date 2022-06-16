@extends('admin.admin_master')
@section('content')
<section class="content">
<div class="row">
    
    <div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Product Details</h3>
    </div>
    <br>
    <div class="card px-3" style="border-radius:none">
    <div class="row">
        <div class="col-md-3">
        <h6 class="card-title">Product Thumbnail</h6>
        <img src="{{ asset('storage/upload/product/thumbnail/'.$prods->product_thumbnail) }}" 
        class="card-img-top" style="height:150px">
        </div>
        <div class="col-md-9">
            <div class="row">
               
            </div>
        </div>
        
    </div>
    
    </div>
    <div class="row">
        <div class="col-md-3">
            <h6 class="px-3">Brand Id</h6>
            <p class="text-center">{{$prods->brand_id}}</p>
        </div>
        <div class="col-md-3">
            <h6 class="px-3">Category Id</h6>
            <p class="text-center">{{$prods->category_id}}</p>
        </div>
        <div class="col-md-3">
            <h6 class="px-3">SubCategory Id</h6>
            <p class="text-center">{{$prods->subcategory_id}}</p>
        </div>
        <div class="col-md-3">
            <h6 class="px-3">Sub->SubCategory Id</h6>
            <p class="text-center">{{$prods->subsubcategory_id}}</p>
        </div>
    </div>

    </div>
</div>
</section>
@endsection