<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //  Here, we're using the Eloquent ORM to query the database and retrieve all users where the 'role_as' column has a value of 0.
    function users(){
        //     // Here, we're using the Eloquent ORM to query the database and retrieve all users where the 'role_as' column has a value of 0.
        $users = User::where('role_as', 0)->get();
        return view('admin.users.index', compact('users'));
    }

    function view_user($id){
        // Here, we're using the Eloquent ORM to find a user with the given $id in the database.
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
}
