<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{



    public function index(){

        //one to one to relationships

        //user with contact details
        /* $user = User::with('contact')->first(); // contact hum na user model man define kya ha
        return $user->contact; */

        //contact with user details
        /*
            $contact = Contact::with('user)->first();
            dd($contact->toArray());
        */


        //one to many relationship

        /* $user = User::with(['contact', 'posts'])->find(1);
        // return $user->toArray();

        //if you want to see in aray form then uncomment below command
        // dd($user->toArray()); */

        //ya post kis user na likhe ha
       /*  $post = Post::with('user')->first();
        dd($post->toArray()); */


        



    }
}
