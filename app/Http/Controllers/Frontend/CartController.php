<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
  public function cart(Request $request){



$cart =  new Cart();
$carts = Cart::where('user_id',Auth::user()->id)->count();

$cart->food_id = $request->food_id;
$cart->user_id = $request->user_id;
$cart->quantity = $request->quantity;
$cart->save();


$cartCount = Cart::where('user_id', Auth::user()->id)->count();
        session(['cart' => $cartCount]);
Session::flash('success','Card Added successfully');
return redirect()->back();
  }
}
