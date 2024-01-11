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

    $food = Food::where('slug', $slug)->first();

    return view('Backend.Pages.Food.show',compact('food'));
 }
 public function edit($id){


    $food = food::findorfail($id);
    $category=Category::all();
    return view('Backend.Pages.Food.edit',compact('food','category'));
 }
 public function update(Request $request,$id){
    $food=food::findorfail($id);
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
    toast('Food update','success');
    return redirect()->back();

 }



 public function delete($id){
    $food = food::findOrFail($id);
    $imagename=$food->image;
    $image_path = public_path().'/image/';
    $file=$image_path .$imagename;
    if(file_exists($file)){
        unlink($file);
    }
    $food->delete();
    toast( $food->name . " " .'Delete successfully');
    return redirect()->back();

 }
}
