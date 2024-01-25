<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\food;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class FoodController extends Controller
{
    public function food(){
        $food = food::all();
        return response()->json($food);
    }

    public function singlefood($id){
        $food = food::findOrFail($id);
        return response()->json($food);
    }
    public function delete($id){
        $food=food::findorfail($id);
        $food->delete();
        return response()->json([
            'message' =>$food->name . 'Deleted successcylly',
            'status' =>'success',
        ]);
    }
    public function store(Request $request){
        $food = new food();
        $food->name=$request->name;
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
        if($food){
            return response()->json([
                'message' => 'food inserted',
                'data' => $food,
                'status' => true


            ]);
        }
    }
}
