<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers(){
        // $users = DB::table('users')
                    // ->where('city','Mithi')
                    // ->orderBy('name')
                    // ->simplePaginate(4);

                    // ->Paginate(4);
        // $users = DB::table('users')->paginate(5, ['name', 'email'],'search', 2); // per page 5, name and eamil colum show kro, page ka name searcho ho, page number 2 first sa show ho
        // return $users;

        $users = DB::table('users')->paginate(5, ['*'],'search', 2)->appends(['sort'=>'votes', 'a'=>'b']); //* all recrods
        return view('allusers', ['data'=>$users]);
    }
    public function singleUsers(string $id){
        $users = DB::table('users')->where('id',$id)->get();
        return view('user', ['data' => $users]);
    }
}
