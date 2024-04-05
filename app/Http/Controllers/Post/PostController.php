<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function CreatePost(){

return view('frontend.post.create_post');

    }//end method


    function AllPost(Request $request){


        $search = $request['search'] ?? "";
        if($search !== "") {
            $published = Post::where('title', 'LIKE', "%$search%")->orWhere('title', 'LIKE', "%$search%")->get();
        } else {
            $published = []; // Initialize an empty array if no posts are found
        }
    
        // dd($search);
       $posts = Post::latest()->get();
        return view('frontend.post.all_post',compact('published','search','posts'));
    }//end method




    public function StorePost(Request $request )
   {
    $validated = $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',

    ]);


    $postData = new Post();
    $postData->title =$request->title;
    $postData->content =$request->content;
    $postData->image =$request->image;


      $postData->user_id =auth()->check() ? auth()->user()->id : null;


    if($request->file('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $postData['image']= $filename;
    }
    $postData->save();


    ///dd($postData);
    $notification= array(

          'message'=>'Post Create Succesfully',
          'alert-type'=>'success',
     );




//Session::flash('message', 'Post Create Succesfully');
    return redirect()->back()->with($notification);
   }
   //end method




   
   public function postEdit( $id = null)
   {
   $postData = Post::find($id);
  return view('Frontend.post.edit_post',compact('postData'));
   

   }
   //end method




   public function updatePost(Request $request,$id )
   {
    $validated = $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',

    ]);


    $postData = Post::find($id);
    $postData->title =$request->title;
    $postData->content =$request->content;
    $postData->image =$request->image;


      $postData->user_id =auth()->check() ? auth()->user()->id : null;


    if($request->file('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $postData['image']= $filename;
    }
    $postData->save();


    ///dd($postData);
    $notification= array(

          'message'=>'Post update Succesfully',
          'alert-type'=>'success',
     );




//Session::flash('message', 'Post Create Succesfully');
    return redirect()->back()->with($notification);
   }
   //end method




   public function postDelete( $id = null)
   {
   $postDelete = Post::find($id);
   $postDelete->delete();

   $notification= array(

    'message'=>'Post Delete Succesfully',
    'alert-type'=>'success',
);

return redirect()->back()->with($notification);

   }
//end method
   

}
