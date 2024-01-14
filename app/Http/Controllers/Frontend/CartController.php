<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Can;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        // $totalSum = Cart::where('user_id',Auth::user()->id)->sum(totalAmount);
        return view('Frontend.Page.Cart.cart',compact('cart'));
    }
    public function cart(Request $request)
    {

        if (!Auth::user()) {
            return redirect()->route('login');
        } else {

           $food = $request->food_id;
           $foods = food::find($food);
            $foodPrice = $foods->price;
            $totalAmount = $foodPrice * $request->quantity;
            $cart =  new Cart();
            $cart->food_id = $request->food_id;
            $cart->user_id = $request->user_id;
            $cart->quantity = $request->quantity;
            $cart->total_amount = $totalAmount;
            $cart->save();
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
            session(['cart' => $cartCount]);
            Session::flash('success', 'Card Added successfully');
            return redirect()->back();
        }
    }
    public function order(){
        return view('Frontend.Page.Cart.order');
    }
}
