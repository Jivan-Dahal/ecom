<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\food;
use Illuminate\Http\Request;

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
}
