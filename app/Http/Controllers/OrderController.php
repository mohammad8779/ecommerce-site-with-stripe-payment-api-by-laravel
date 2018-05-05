<?php

namespace App\Http\Controllers;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{
    //
    public function orders($type =''){

    	if($type == 'pending'){
    		$orders = Order::where('delivered','0')->get();
    	}
    	elseif($type == 'delivered '){
    		$orders = Order::where('delivered','1')->get();
    	}
        else{
        	$orders = Order::all();
        }

        return view('admin.orders',compact('orders'));
    }


    public function toggledeliver(Request $request, $orderId){
        

    	$order = Order::find($orderId);
        
        if($request->has('delivered')){

            Mail::to($order->user)->send(new OrderShipped($order));
    	    $order->delivered = $request->delivered;
        }
        else{

        	$order->delivered = '0';
        }
    	$order->save();
    	return back();
    }
}