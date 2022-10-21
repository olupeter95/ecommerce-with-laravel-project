@extends('admin.admin_master')

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Order Details</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Order Details</li>
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
            <h4 class="box-title"><strong>Shipping Details</strong></h4>
            </div>
            
                <table class="table">
                    <tr>
                    <th> Shipping Name : </th>
                    <th> {{ $order->name }} </th>
                    </tr>

                    <tr>
                    <th> Shipping Phone : </th>
                    <th> {{ $order->phone }} </th>
                    </tr>
                    
                    <tr>
                    <th> Shipping Email : </th>
                    <th> {{ $order->email }} </th>
                    </tr>

                    <tr>
                    <th> Division : </th>
                    <th> {{ $order->division->division_name }} </th>
                    </tr>

                    <tr>
                    <th> District : </th>
                    <th> {{ $order->district->district_name }} </th>
                    </tr>

                    <tr>
                    <th> State : </th>
                    <th>{{ $order->state->state_name }} </th>
                    </tr>

                    <tr>
                    <th> Postal Code : </th>
                    <th> {{ $order->postal_code }} </th>
                    </tr>

                    <tr>
                    <th> Order Date : </th>
                    <th> {{ $order->order_date }} </th>
                    </tr>

                </table>
            
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="box box-bordered border-primary">
            <div class="box-header with-border">
            <h4 class="box-title"><strong>Order Details</strong>
            <span class="text-danger"> Invoice : {{ $order->invoice_number }}</span>
            </h4>
            </div>
            
                <table class="table">
                    <tr>
                    <th>  Name : </th>
                    <th> {{ $order->user->name }} </th>
                    </tr>

                    <tr>
                    <th>  Phone : </th>
                    <th> {{ $order->user->phone }} </th>
                    </tr>

                    <tr>
                    <th> Payment Type : </th>
                    <th> {{ $order->payment_method }} </th>
                    </tr>

                    <tr>
                    <th> Tranx ID : </th>
                    <th> {{ $order->transaction_id }} </th>
                    </tr>

                    <tr>
                    <th> Invoice  : </th>
                    <th class="text-danger"> {{ $order->invoice_number }} </th>
                    </tr>

                    <tr>
                    <th> Order Total : </th>
                    <th>{{ $order->amount }} </th>
                    </tr>

                    <tr>
                    <th> Order : </th>
                    <th>   
                        <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
                    </tr>
                </table>
            
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="box box-bordered border-primary">
            <div class="box-header with-border">
            <h4 class="box-title"><strong>Product Details</strong></h4>
            </div>
            
                <div class="table-responsive">
                    <table class="table">
                    <tbody>

                        <tr>
                        <th>
                            <label for=""> Image</label>
                        </th>

                        <th>
                            <label for=""> Product Name </label>
                        </th>

                        <th>
                            <label for=""> Product Code</label>
                        </th>


                        <th>
                            <label for=""> Color </label>
                        </th>

                        <th>
                            <label for=""> Size </label>
                        </th>

                        <th>
                            <label for=""> Quantity </label>
                        </th>

                        <th>
                            <label for=""> Price </label>
                        </th>

                        </tr>


                        @foreach($orderItem as $item)
                        <tr>
                        <td width="10%">
                            <label for=""><img src="{{ asset('storage/upload/product/thumbnail/'.$item->product->product_thumbnail) }}" height="50px;" width="50px;"> </label>
                        </td>

                        <td width="20%">
                            <label for=""> {{ $item->product->product_name_en }}</label>
                        </td>


                        <td width="10%">
                            <label for=""> {{ $item->product->product_code }}</label>
                        </td>

                        <td width="10%">
                            <label for=""> {{ $item->color }}</label>
                        </td>

                        <td width="10%">
                            <label for=""> {{ $item->size }}</label>
                        </td>

                        <td width="10%">
                            <label for=""> {{ $item->qty }}</label>
                        </td>

                        <td width="10%">
                            <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                        </td>

                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            
        </div>
    </div>
  </div>
</section>
@endsection