<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

use App\Categories;
use App\Tags;
use App\Posts;
use App\Images;


class PageController extends Controller
{

  // Homepage
    public function index(){
      $get_post = Posts::orderby('id','desc')->paginate(8);
      $get_cat = Categories::all();
      $get_tag = Tags::all();
      $reatured_posts = Posts::all()->take(2);
      return view('index')
      ->with('get_post', $get_post)
      ->with('get_cat', $get_cat)
      ->with('reatured_posts', $reatured_posts)
      ->with('get_tags', $get_tag);
    }
  // Blog
  public function blog(){
    $get_post = Posts::orderby('id','desc')->paginate(6);
    $recent_posts = Posts::all()->take(10);
    $get_cat = Categories::all();
    $get_tag = Tags::all();
    return view('blog')
    ->with('recent_posts', $recent_posts)
    ->with('get_post', $get_post)
    ->with('get_cat', $get_cat)
    ->with('get_tags', $get_tag);
  }

  // About
  public function about(){
    return view('about');
  }

  // Contact
  public function contact(){
    return view('contact');
  }

  // Send Email
  public function storecontact(Request $data){
    $data->validate([
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'required'
    ]);
    Mail::to('test@test.com')->send(new ContactFormMail($data));
    return redirect('contact')->with('message', 'Sumission successfully done!');
  }
    //show search results
    public function search(Request $request){

        $search_key = $request->search_key;

        $result = Posts::orderby('id', 'desc')
        ->where('post_title', 'like', '%'.$search_key.'%')
        ->orWhere('post_description', 'like', '%'.$search_key.'%')
        ->get();

        return view('result')->with('result', $result);
    }
    // Display posts by tags
    public function post_by_category($category){
      $search_cat = $category;
      $post_by_cat = Posts::orderby('id', 'desc')
      ->where('category_id', 'like', '%'.$search_cat.'%')
      ->get();
      return view('post_by_cat')->with('post_by_cat', $post_by_cat);
    }
    // Display posts by tags
    public function post_by_tag($tag){
      $search_tag = $tag;
      $post_by_tag = Posts::orderby('id', 'desc')
      ->where('tag_id', 'like', '%'.$search_tag.'%')
      ->get();
      return view('post_by_tag')->with('post_by_tag', $post_by_tag);
    }
}
