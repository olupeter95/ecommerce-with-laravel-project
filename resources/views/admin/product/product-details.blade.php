@extends('admin.admin_master')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Product Details</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Product Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="content">
  <div class="row">
    <div class="col-md-6 col-12">
        <div class="box box-bordered border-primary">
            <div class="box-header with-border">
            <h4 class="box-title"><strong>Product Details</strong></h4>
            </div>
            
                <table class="table">
                    <tr>
                        <th> Product Name : </th>
                        <th> {{ $prod->product_name_en }} </th>
                    </tr>
                        <th> Product Slug : </th>
                        <th> {{ $prod->product_slug_en }} </th>
                    </tr>
                    </tr>
                        <th> Product Tag : </th>
                        <th> {{ $prod->product_tags_en }} </th>
                    </tr>
                    <tr>
                        <th> Brand Name: </th>
                        <th> {{ $prod->brand->brand_name_en }} </th>
                    </tr>
                    
                    <tr>
                    <th> Category Name : </th>
                    <th> {{ $prod->category->category_name_en }} </th>
                    </tr>

                    <tr>
                    <th> SubCategory Name : </th>
                    <th> {{ $prod->subcategory->subcategory_name_en }} </th>
                    </tr>

                    <tr>
                    <th> SubSubCategory Name : </th>
                    <th> {{ $prod->subsubcategory->subsubcategory_name_en }} </th>
                    </tr>
                </table>
            
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="box box-bordered border-primary">
            <div class="box-header with-border">
            <h4 class="box-title"><strong>Product Description</strong></h4>
            </div>
            
                <table class="table">
                    <tr>
                       <th> Product image : </th>
                        <th> 
                            <img src="{{ asset('storage/upload/product/thumbnail/'.$prod->product_thumbnail) }}" 
                            alt="" style="width:80px;height:80px"> </th>
                    </tr>

                    <tr>
                        <th> Product Size: </th>
                        <th> {{ $prod->product_size_en }} </th>
                    </tr>
                    
                    <tr>
                        <th> Product Colour : </th>
                        <th> {{ $prod->product_color_en }} </th>
                    </tr>
                    <tr>
                    <th> Product Code : </th>
                    <th>{{ $prod->product_code }} </th>
                    </tr>
                    <tr>
                        <th> Product price : </th>
                        <th>
                            @if($prod->discount_price == null)
                            ${{ $prod->selling_price }}
                            @else
                            ${{ $prod->discount_price }} <span class="text-danger"><del>${{ $prod->selling_price }}</del></span>
                            @endif
                        </th>
                    </tr>

                   

                </table>
            
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title box-title-bold">Short Description</h4>
                    </div>
                    <div class="box-body">
                        <p>{{ $prod->short_desc_en }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title box-title-bold">Description</h4>
                    </div>
                    <div class="box-body">
                        <p>{{ $prod->description_en  }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="box box-bordered border-primary">
            <div class="box-header with-border">
                <h4 class="box-title"><strong>Multi Image</strong></h4>
            </div>

            <div class="row row-sm p-4">
                @foreach($multiImg as $img)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('storage/upload/product/image/'.$img->photo_name) }}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
  </div>
</section>
@endsection