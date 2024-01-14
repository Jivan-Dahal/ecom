<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\food;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $category = Category::all();
        $food=food::all();
        return view ('Frontend.page.product.index',compact('food','category'));
    }
    public function ByCategory($id){
        $product=food::where('category_id',$id)->get();
       // return $product;
        $category=Category::all();
return view('Frontend.Page.Product.productCategory',compact('product','category'));
    }
    public function show($slug){
        $food = Food::where('slug', $slug)->first();

    return view('Frontend.Page.Product.show',compact('food'));
    }
    
}
