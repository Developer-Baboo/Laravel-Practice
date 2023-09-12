<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($postId)
    {
        return "index".$postId;
    }
    public function create(){
        return view("contact");
    }

    public function contact(){
        return view("pages.contact");
    }

}
