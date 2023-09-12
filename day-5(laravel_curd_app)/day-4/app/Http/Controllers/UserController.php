<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers(){

        $users = DB::table('users')
                    ->orderBy('id', 'desc') // Replace 'column_name' with the actual column name
                    ->get();

        // $users = DB::table('users')->where('city','mithi')->get();
        // $users = DB::table('users')->where('city','mithi')->where('age','>',21)->get();
        // $users = DB::table('users')->where('city','mithi')->where('name','like','B%')->get();
        // $users = DB::table('users')->where('city','mithi')->where([['name','like','B%'],['age','>',20] ])->get();
        // $users = DB::table('users')->where('city','mithi')->orWhere('age','<',200)->get();
        // $users = DB::table('users')->whereBetween('id',[1,6])->get();
        // $users = DB::table('users')->whereBetween('age',[1,100])->get();
        // $users = DB::table('users')->whereNotBetween('age',[1,100])->get();
        // $users = DB::table('users')->whereIn('age',[20,21])->get();
        // $users = DB::table('users')->whereIn('city',["Mithi","Karachi"])->get();
        // $users = DB::table('users')->whereNotIn('city',["Mithi","Karachi"])->get();
        /* $users = DB::table('users')
                    // ->select('city')
                    // ->distinct()
                    // ->get(); */

        // $users = DB::table('users')
        //             ->pluck('name', 'email'); //2 parementer nhi ayenga otherwise will consider it as key and value

        // $users = DB::table('users')->where('id', 2)->get();

        // $users = DB::table('users')->find(4); // return array
        // return $users;
        // dd($users);
        // foreach($users as $user)
        // {
        //     echo $user->name. "<br>";
        // }

        return view('allusers', ['data'=>$users]);
    }
    public function singleUsers(string $id){
        $users = DB::table('users')->where('id',$id)->get();
        return view('user', ['data' => $users]);
    }

    public function addUsers( Request $req){
        $user = DB::table('users')
        ->insert([
            'name' => $req->username,
            'email' => $req->useremail,
            'age' => $req->userage,
            'city' => $req->usercity,
        ]);
        // dd it is used for debug info
        // return view('adduser');
        if($user){
            return redirect()->route('users')->with('message', 'User Added Successfully');
        }else{
        echo "<h1>Data not added successfully</h1>";
     }
    }

    public function deleteUser(string $id){
        // die($id);
        $user = DB::table('users')
                ->where('id', $id)
                ->delete();
        // diep($id);
        // die("hello");
        if($user){
            return redirect()->route('users')->with('message', 'Uer deleted Successfully');
        }
    }

    public function updatePage(string $id){
        // $user = DB::table('users')->where('id', $id)->post();
        $user = DB::table('users')->find($id);
        // return $user;
        return view('updateuser', ['data' => $user]);
    }

    public function updateUser(Request $req, $id){
        $user = DB::table('users')
                ->where('id', $id)
                ->update([
                        'name' => $req->username,
                        'email' => $req->useremail,
                        'age' => $req->userage,
                        'city' => $req->usercity,
                    ]);
        if($user){
            return redirect()->route('users')->with('message', 'User Updated Successfully');
        }else{
            echo "<h1>Data not updated successfully</h1>";
        }
    }
}
