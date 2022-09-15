<?php

namespace App\Actions\Frontend\Payment;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class StripeOrder
{
    public function handle(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        Stripe::setApiKey('sk_test_51LhaQTBzzp2Bcr39JqZolzAW1YmArOscW01AKrt88yTqZCNOupoYDerolXEs5UZywHsQbDqxoGz6L3vnLvwV0J1K0053bGZNYl');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Lacime Online Store',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]); 
        dd($charge);
    }
}