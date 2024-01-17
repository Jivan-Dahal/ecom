<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        $items = DB::table('food')
            ->join('order_items', 'order_items.food_id', 'food.id')
            ->select('food.name', 'food.image', 'order_items.*')
            // ->where('order_items.order_id', '=', $orders->first()->id)
            ->get();
        return view('Backend.Pages.Order.index', compact('order', 'items'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::findorfail($id);
        $order->order_status = $request->order_status;
        $order->save();
        toast('Status Changed', 'success');
        return redirect()->back();
    }
}
