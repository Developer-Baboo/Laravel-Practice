<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Contactinformation;
use App\Models\Video;

class TestController extends Controller
{



    public function index(){

        //////////////////////////////////////////////////////////////////////////////////////////one to one to relationships//////////////////////////////////////////////////

        //user with contact details
        /* $user = User::with('contact')->first(); // contact hum na user model man define kya ha
        return $user->contact; */

        //contact with user details
        /*
            $contact = Contact::with('user)->first();
            dd($contact->toArray());
        */


        ///////////////////////////////////////////////////////////////////////////////////one to many relationship//////////////////////////////////////////////////////

        /* $user = User::with(['contact', 'posts'])->find(1);
        // return $user->toArray();

        //if you want to see in aray form then uncomment below command
        // dd($user->toArray()); */

        //ya post kis user na likhe ha
       /*  $post = Post::with('user')->first();
        dd($post->toArray()); */





         /////////////////////////////////////////////////////////////////////////////////// Many to many relationship//////////////////////////////////////////////////////
        //one post have how many category

        /* $categories = category::all();
        $post = Post::with('categories')->first();
        $post->categories()->attach($categories);

        $post = Post::with('categories')->first();
        dd($post->toArray()); */



        /////////////////////////////////////////////////////////////////////////////////////////////Has One Through

        //user ka sath contact ke informatin sath contact ke detial
        /* $user = User::with('contact.contactinformation')->first();
        dd($user->toArray()); */


        //user and contact details

        /* $user = User::with('contactContactinformation')->first();
        dd($user->toArray()); */


        ///////////////////////////////////////////////////////////////////////Has Many Through

        //country data
        /* $country = Country::first();
        dd($country->toArray()); */


        // first country ka andr kitne status han
        /* $country = Country::with('states')->first();
        dd($country->toArray()); */

        //ek country ka kitna staus han and hr status ka andr kitne cities han
       /*  $country = Country::with('states.cities')->first();
        dd($country->toArray()); */

        //Mujha hr countries ka city cheya without status

       /*  $country = Country::with('stateCity')->first();
        dd($country->toArray());
 */



 //////////////////////////////////////////////////////////////////////////////////////////////////Polymorphic 1 to 1

 //fetch only user data
 /* $user = User::first();
 dd($user->toArray()); */

 //fetch user data with image

 /* $user = User::with('image')->first();
 dd($user->toArray()); */


//  fetch post data with image
/* $post = Post::with('image')->first();
dd($post->toArray()); */

 //////////////////////////////////////////////////////////////////////////////////////////////////Polymorphic 1 to many

 //ek post multiple images
 /* $post = Post::with('image')->first();
 dd($post->toArray()); */

 //ek user multiple image
 /* $user = User::with('image')->first();
 dd($user->toArray()); */



  //////////////////////////////////////////////////////////////////////////////////////////////////Polymorphic Many to many

  //fetch first post
 /*  $post = Post::first();
  dd($post->toArray()); */

//fetch post with tags
/* $post = Post::with('tags')->first();
dd($post->toArray()); */


//fetch video with tag
$video = Video::with('tags')->first();
dd($video->toArray());





    }
}