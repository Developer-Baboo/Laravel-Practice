<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;

class ProvisionServer extends Controller
{
    /**
     * Provision a new web server.
     */
    
    public function index($id)
    {
       return "Hello this is server page".$id;
    }
}
