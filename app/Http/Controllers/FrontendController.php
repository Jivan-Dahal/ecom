<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Cart;
use App\Models\food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function home(){


        $carousel=Carousel::where('status',1)->get();
    $foods=food::latest()->take(4)->get();


        return view('Frontend.Home',compact('carousel','foods'));
}


}
