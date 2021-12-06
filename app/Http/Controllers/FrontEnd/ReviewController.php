<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ReviewController extends Controller
{
    public function add($product_slug)
    {
       $product = Product::where('slug', $product_slug)->where('status', '0')->first(); 
       
       if($product_check)
       {
             $product_id = $product->id;
             $verified_purchase = Order::where('order.user_id', Auth::id())
                 ->join('order_items', 'orders.id','order_items.order_id')
                 ->where('order_items.prod_id', $product_id)->get(); 
                 return view('frontend.reviews.index', compact('product', 'verified_purchase'));
       }
       else
       {
           return redirect()->back()->with('status', "The link you followed was broken");        }
    }
}
