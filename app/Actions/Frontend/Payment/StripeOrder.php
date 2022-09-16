<?php

namespace App\Actions\Frontend\Payment;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeOrder
{
    public function handle(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        Stripe::setApiKey('sk_test_51LhaQTBzzp2Bcr39JqZolzAW1YmArOscW01AKrt88yTqZCNOupoYDerolXEs5UZywHsQbDqxoGz6L3vnLvwV0J1K0053bGZNYl');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = Charge::create([
            'amount' => $total_amount*100,
            'currency' => 'usd',
            'description' => 'Lacime Online Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]); 
        $request->merge([
            'user_id' => Auth::id(),
            'payment_type' => 'stripe',
            'payment_method' => 'stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_number' => 'LOS'.mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

        $order_id = Order::insertGetId($request->except('_token','stripeToken'));
        $carts = Cart::content();

        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }
        
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::destroy();
    }
}