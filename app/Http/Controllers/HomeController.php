<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Index(){
        return view('Frontend.home');
    }//end method

    function Dashboard(){

        return view('Frontend.layout.dashboard');
    }
}
