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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Can;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        // $orderId = Order::where('user_id',Auth::user()->id)->pluck('id');

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

    //ORDER FEATURES START......


    public function order(Request $request){
        $order= new Order();
        $order->user_id = Auth::user()->id;
        $order->total_price= $request->total_price;
        $order->address= $request->address;
        $order->fullname= $request->fullname;
        $order->number= $request->number;
        if($order->save()){
            $carts=Cart::where('user_id',Auth::user()->id)->get();
            foreach($carts as $item){
                $food=food::find($item->food_id);
                $orderItem=new OrderItem();
                $orderItem->food_id=$item->food_id;
                $orderItem->quantity=$item->quantity;
                $orderItem->price= $food->price;
                $orderItem->food_id=$item->food_id;
                $orderItem->order_id=$order->id;
                $orderItem->save();
                $item->delete();

            }

        }
        return redirect()->route('home')->with('success','Success! Your order has been placed');

    }
    public function myOrder(){
        $orders=Order::where('user_id',Auth::user()->id)->get();
        $items=DB::table('food')
        ->join('order_items','order_items.food_id','food.id')
        ->select('food.name','food.image','order_items.*')
        // ->where('order_items.order_id', '=', $orders->first()->id)
        ->get();
        return view('Frontend.Page.Cart.showOrder',compact('orders','items'));
    }

}
