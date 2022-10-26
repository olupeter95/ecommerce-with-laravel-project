@extends('home_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('layouts.body.user_sidebar')
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                               <td class="col-md-1">
                                    <label for="">Date</label>
                               </td> 
                               <td class="col-md-1">
                                    <label for="">Total</label>
                               </td> 
                               <td class="col-md-1">
                                    <label for="">Payment</label>
                               </td> 
                               <td class="col-md-3">
                                    <label for="">Invoice</label>
                               </td> 
                               <td class="col-md-1">
                                    <label for="">Order</label>
                               </td> 
                               <td class="col-md-3">
                                    <label for="">Actions</label>
                               </td> 
                            </tr>
                            @foreach($orders as $order)
                            <tr>
                               <td>
                                    <label for="">{{$order->order_date}}</label>
                               </td> 
                               <td>
                                    <label for="">${{$order->amount}}</label>
                               </td> 
                               <td>
                                    <label for="">{{$order->payment_method}}</label>
                               </td> 
                               <td>
                                    <label for="">{{$order->invoice_number}}</label>
                               </td> 
                               <td>
                                <label for="">
                                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">
                                    {{ $order->status }} </span>
                                    <span class="badge badge-pill badge-danger" style="background: #418DB9;">
                                        Return Request 
                                   </span>
                                </label>
                               </td> 
                               <td>
                                <a href="{{ route('user-order-details',$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                                <a target="_blank" href="{{ route('order-invoice',$order->id) }}" class="btn btn-sm btn-danger" style="margin-top:5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>
                               </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end row-->
        <br>
    </div><!--end container-->
</div>
@endsection