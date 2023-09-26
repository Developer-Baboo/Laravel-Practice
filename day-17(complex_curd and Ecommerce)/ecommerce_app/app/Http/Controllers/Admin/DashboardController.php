<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    function users(){
        $users = User::where('role_as', 0)->get();
        return view('admin.users.index', compact('users'));
    }

    function view_user($id){
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
}
