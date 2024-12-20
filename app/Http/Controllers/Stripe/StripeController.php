<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripeController extends Controller
{
    public function index()
    {
    	return view('stripe.test');
    }

    public function charge(Request $request)
    {
        
        try {
		    Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

		    $customer = Customer::create(array(
		        'email' => $request->stripeEmail,
		        'source' => $request->stripeToken
		    ));

		    $charge = Charge::create(array(
		        'customer' => $customer->id,
		        'amount' => 1999,
		        'currency' => 'usd'
		    ));

		    return 'Charge successful, you get the course!';
		} catch (\Exception $ex) {
		    return $ex->getMessage();
		}
    }

    
}
