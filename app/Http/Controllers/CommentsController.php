<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Posts;
use App\Comments;
use App\User;

class CommentsController extends Controller
{


    //Save Comments
    public function save_comment(Request $request, $post){

        $post_info = Posts::find($post);

        $comments = new Comments;
        $comments->body = $request->body;
        $comments->user_id = auth()->user()->id;

        $post_info->comments()->save($comments);


        //Delete orphan comment
        $cid = Comments::pluck('id')->toArray();
        Comments::whereNotIn('parent_id', $cid )->delete();

      return redirect::back()->with('message','Your comment has been submitted!');
    }


    //Save Reply
    public function save_reply(Request $request, $post){

        $post_info = Posts::find($post);

        $comments = new Comments;
        $comments->parent_id = $request->reply;
        $comments->body = $request->body;
        $comments->user_id = auth()->user()->id;

        $post_info->comments()->save($comments);

        //Delete orphan comment
        $cid = Comments::pluck('id')->toArray();
        Comments::whereNotIn('parent_id', $cid )->delete();


      return redirect::back()->with('message','Your comment has been submitted!');
    }


    //Delete Comment/Reply
    public function delete_comment($id){
      $c = Comments::find($id);

        if ($c->user_id == auth()->user()->id) { //only who commented can delete that specific comment
          $comments = DB::table('comments')
                     ->where('id', $id)
                     ->delete();
          //Delete orphan comments
          $cid = Comments::pluck('id')->toArray();
          Comments::whereNotIn('parent_id', $cid )->delete();
          return redirect::back()->with('message','Your comment has been Deleted!');
        }else{
          return redirect::back()->with('warning','Your cannot delete this comment');
        }


    }
}
