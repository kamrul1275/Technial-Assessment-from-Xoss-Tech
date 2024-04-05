<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    function ViewPost($id){

      
       $posts = Post::findOrFail($id);
       $comments = $posts->comment()->with('user')->get(); // Assuming you have a relationship between posts and comments
       //return view('your_view', compact('post', 'comments'));
        return view('frontend.post.view_post',compact('posts', 'comments'));
    }




    public function storeComment(Request $request,$id )
   {
    $validated = $request->validate([
        'commentarea' => 'required',
       
    ]);

    $postData = new Comment();
    $postData->commentarea =$request->commentarea;
    $postData->user_id =Auth::user()->id;
    $postData->post_id =$request->post_id;
    $postData->save();
    $notification= array(

          'message'=>'Comment Create Succesfully',
          'alert-type'=>'success',
);




//Session::flash('message', 'Post Create Succesfully');
    return redirect()->back()->with($notification);
   }


    
}
