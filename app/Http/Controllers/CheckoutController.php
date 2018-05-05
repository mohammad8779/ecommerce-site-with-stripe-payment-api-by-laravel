<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutController extends Controller
{
    /**** this is not need
    public function step1(){
    
    if (Auth::check()) {
      
      return redirect()->route('checkout.shipping');
    
    }

        return redirect('login');
    }
    ********/
    public function shipping(){
    	return view('front.shipping-info');
    }
    
    //for stripe payment
    public function payment()
    {
        return view('front.payment');
    }
    

    //************for stripe payment by php option from srtipe charge*****************//

    public function storePayment(Request $request)
    {
        

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_rEAofvlIfbxhKyC4JM4DeQEZ");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $request->stripeToken;

        // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
          "amount" => Cart::total()*100, // Amount in customer personal cart,
          "currency" => "usd",
          "description" => "Example charge",
          "source" => $token,
        ));

        //dd('success payment by stripe');

       

       //Create the order
       Order::createOrder();
      //redirect user to some page
        return "Order completed";
        
    }
}
