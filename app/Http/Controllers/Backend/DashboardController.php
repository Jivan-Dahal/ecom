<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('Backend.Main.Main');
    }

    public function logouts(){

        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
