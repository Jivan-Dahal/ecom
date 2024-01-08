<?php

namespace App\Http\Controllers;

use App\Models\food;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $food = food::all();
  return view('Frontend.Home',compact('food'));
}
}
