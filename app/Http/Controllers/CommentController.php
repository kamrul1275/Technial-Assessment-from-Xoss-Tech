<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    function ViewPost($id){

        $viewData = Post::find($id);
       // dd($viewData);
        return view('frontend.post.view_post',compact('viewData'));
    }




    public function storeComment(Request $request )
   {
    $validated = $request->validate([
        'commentarea' => 'required',
       
    ]);

    $postData = new Comment();
    $postData->commentarea =$request->commentarea;
    $postData->user_id =Auth::user()->id;
    $postData->post_id =$request->post_id;

  //  dd($request->post_id);

    $postData->save();

    $notification= array(

          'message'=>'Comment Create Succesfully',
          'alert-type'=>'success',
);




//Session::flash('message', 'Post Create Succesfully');
    return redirect()->back()->with($notification);
   }


    
}
