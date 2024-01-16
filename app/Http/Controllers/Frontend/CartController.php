<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\food;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Can;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        // $orderId = Order::where('user_id',Auth::user()->id)->pluck('id');

        // $totalSum = Cart::where('user_id',Auth::user()->id)->sum(totalAmount);
        return view('Frontend.Page.Cart.cart',compact('cart','orderId'));
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
    public function Delete($id){
        $cart=Cart::findorfail($id);
        $cart->delete();
        toast( $cart->name . " " .'Delete successfully');
        return redirect()->back();

    }
    public function deleteAll($userid){
        Cart::where('user_id', $userid)->delete();
        return redirect()->back();
    }
    public function order(Request $request){
        $order= new Order();
        $order->user_id = Auth::user()->id;
        toast('Order Successfull','success');
        $order->save();
        return redirect()->back();
        // if($order){
        //     $orderItem = new OrderItem();

        // }
        // $order->user_id=$request->user_id;

        // $orderItem = $request->food_id;
        // $jsonItem  = json_encode($orderItem);


        // $order->food_id = $arr;
        // $order->fullname=$request->name;
        // $order->email=$request->email;
        // $order->address=$request->address;
        // $order->number=$request->contact;
        // $order->food=$request->food_name;
        // $order->total_price=$request->total;
        // if($order->save()){
        //     Cart::where('user_id', $request->user_id)->delete();
        //     toast('order sent successfully','success');
        //     return redirect()->route('product');
        // }else{
        //     toast('Order failed','error');
        // }

    }

}
