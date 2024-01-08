<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('Backend.Pages.Category.index',compact('category'));
    }

    public function create(){
        return view('Backend.Pages.Category.create');
    }

    public function store(Request $request){
        $category =  new Category();
        $category->category = $request->category;
        if($request->hasFile('image')){
            $image =  $request->file('image');
            $newImage = $image->hashName();
            $image->move('image',$newImage);
            $category->image = "image/$newImage";
        }
        $category->save();
        toast('category addedd','success');
        return redirect()->back();
    }
    public function edit($id){
        $category = Category::FindOrFail($id);
        return view('Backend.Pages.Category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        if($request->hasFile('image')){
            $image =  $request->file('image');
            $newImage = $image->hashName();
            $image->move('image',$newImage);
            $category->image = "image/$newImage";
        }
        $category->save();
        toast('category updated','success');
        $category->update();
        return redirect()->back();
    }
}
