<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\food;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){


        $carousel=Carousel::where('status',1)->get();
        return view('Frontend.Home',compact('carousel'));
}
}
