<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    function Index(Request $request){
        
        $search = $request['search'] ?? "";
        if($search !== "") {
            $published = Post::where('title', 'LIKE', "%$search%")->orWhere('title', 'LIKE', "%$search%")->get();
        } else {
            $published = []; // Initialize an empty array if no posts are found
        }
    
        // dd($search);
       $posts = Post::latest()->get();
     
        return view('Frontend.home',compact('published','search','posts'));
    }//end method

    function Dashboard(){

        return view('Frontend.layout.dashboard');
    }
}
