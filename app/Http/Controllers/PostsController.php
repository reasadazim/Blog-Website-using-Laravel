<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Tags;
use App\Posts;
use App\Images;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
  //Dashboard - create post
  public function create_post(){
    $categories = Categories::all();
    $tags = Tags::all();
    return view('create_post')->with('categories',  $categories)->with('tags',  $tags);

  }
  //save post
  public function save_post(Request $request){
        $strFromArr = serialize($request->tag_id);
        $posts = new Posts;
        $posts->post_title = $request->post_title;
        $posts->post_description = htmlentities($request->post_description);
        $posts->user_id = $request->user_id;
        $posts->category_id = $request->category_id;
        $posts->tag_id = $strFromArr;
        $posts->save();

        //store image to DB and directory
        $images = new Images;
        $images->post_id = $posts->id;
        $images->image = $request->featured_image->store('/public/images');
        $images->save();

        return redirect()->route('create_post')->with('message','Post created successfully!');
  }
  //Update post
  public function update_post(Request $request, $id){
        $strFromArr = serialize($request->tag_id);
        $posts = Posts::find($id);
        $posts->post_title = $request->post_title;
        $posts->post_description = $request->post_description;
        $posts->user_id = $request->user_id;
        $posts->category_id = $request->category_id;
        $posts->tag_id = $strFromArr;
        $posts->save();

        //store image to DB and directory
        if( ($request->featured_image) == NULL ){}else{
          $images = Images::find($request->image_id);
          $images->image = $request->featured_image->store('/public/images');
          $images->save();
        }


        return redirect::back()->with('message','Post updated successfully!');
  }
  //Delete post
  public function delete_post($id){
        $posts = Posts::find($id);
        $posts->delete();

        //Delete image to DB and directory
        $images = Images::where('post_id',$id);
        $images->delete();

        return redirect::back()->with('message','Post deleted successfully!');
  }
  // Show single post
    public function post($id){
      $single_post = Posts::find($id);
      $tags_list = Tags::all();
      $recent_posts = Posts::all()->take(10);

      return view('post')
      ->with('single_post', $single_post)
      ->with('tags_list', $tags_list)
      ->with('recent_posts', $recent_posts);
    }
    // Show all posts in dashboard
    public function list_posts(){
      $list_posts = Posts::orderby('id','desc')->paginate(6);
      return view('list_posts')->with('list_posts', $list_posts);;
    }

    // Edit  post in dashboard
    public function edit_post($id){
      $post_to_edit = Posts::find($id);
      $cat_to_edit = Categories::all();
      $tag_to_edit = Tags::all();
      return view('edit_post')
      ->with('post_to_edit', $post_to_edit)
      ->with('cat_to_edit', $cat_to_edit)
      ->with('tag_to_edit', $tag_to_edit);
    }

}
