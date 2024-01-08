<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\food;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FoodController extends Controller
{
 public function index(){
    $food = food::all();
     return view('Backend.Pages.Food.index',compact('food'));

 }

 public function create(){
    $category =  Category::all();

    return view('Backend.Pages.Food.create',compact('category'));

 }

 public function store(Request $request){
    $food = new food();
    $food->name=$request->food_name;
    $food->price=$request->price;
    $food->slug= Str::slug($request->slug,'-');
    $food->description=$request->description;
    $food->category_id=$request->category_id;
    if($request->hasFile('image')){
        $image =  $request->file('image');
        $newImage = $image->hashName();
        $image->move('image',$newImage);
        $food->image = "image/$newImage";
    }
    $food->save();
    toast('Food addedd','success');
    return redirect()->back();

 }

 public function show($slug){

    $food = food::find($slug);

    return view('Backend.Pages.Food.show',compact('food'));
 }
}
