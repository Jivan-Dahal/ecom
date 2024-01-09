<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    public function userHome()
    {

        $user = User::all();
        return view('Backend.Pages.users', compact('user'));
    }

    public function makeAdmin($id)
    {

        $user = User::findOrFail($id);
        $user->is_role = 1;
        $user->save();
        toast('Role Granted successfully', 'success');

        return redirect()->back();
    }

    public function makeUSer($id)
    {
        $user = User::findOrFail($id);
        $user->is_role = 0;
        $user->save();
        toast('Role Denied successfully', 'error');
        return redirect()->back();
    }
}
