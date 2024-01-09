<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\food;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $carousel=Carousel::all();
  return view('Frontend.Home',compact('carousel'));
}
}
