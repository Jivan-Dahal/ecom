<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index(){
        $carousel =Carousel::all();
        return view('Backend.Pages.Carousel.index',compact('carousel'));
    }
    public function create(){
        return view ('Backend.Pages.Carousel.create');
    }
    public function store(Request $request){
        $carousel =new Carousel();
        if($request->hasFile('image')){
            $image =  $request->file('image');
            $newImage = $image->hashName();
            $image->move('image',$newImage);
            $carousel->image = "image/$newImage";
        }
        $carousel->save();
        toast('Carousel addedd','success');
    return redirect()->back();

    }
    public function ShowCarousel($id)
    {

        $carousel = Carousel::findOrFail($id);
        $carousel->status = 1;
        $carousel->save();
        toast('Showing  successfully', 'success');

        return redirect()->back();
    }

    public function HideCarousel($id)
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->status = 0;
        $carousel->save();
        toast('Hidecarousel', 'error');
        return redirect()->back();
    }
}
