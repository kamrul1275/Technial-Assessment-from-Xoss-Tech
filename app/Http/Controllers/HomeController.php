<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Index(){
        return view('Frontend.layout.master');
    }//end method
}
