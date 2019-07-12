<?php

namespace App\Http\Controllers;

use App\Tags;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
  //Dashboard - create tag
  public function create_tag(){
    $tags = Tags::all();
    return view('create_tag')->with('tags',  $tags);
  }
  //Dashboard - save tag
  public function save_tag(Request $request){
    $request->validate([
      'tag_name' => 'unique:tags'
    ]);
    $tags = new Tags;
    $tags->tag_name = $request->tag_name;
    $tags->save();
    return redirect::back()->with('message','Tag created successfully!');
  }
  //Dashboard - delete tag
  public function delete_tag($id){
    $tags = Tags::find($id);
    $tags->delete();

    return redirect::back()->with('message','Tag deleted successfully!');
  }
  //Dashboard - edit tag
  public function edit_tag($id){

    $tags = Tags::all();
    $tag_e = Tags::find($id);

    return view('edit_tag')->with('tag_e',$tag_e)->with('tags',  $tags);
  }
  //Dashboard - update tag
  public function update_tag(Request $request, $id){
    $request->validate([
      'tag_name' => 'unique:tags'
    ]);
    $tag_e = Tags::find($id);

    $tag_o = $tag_e->tag_name;
    $tag_e->tag_name = $request->tag_name;
    $tags = DB::table('tags')
                ->where('tag_name', $tag_o)
                ->update(['tag_name' => $tag_e->tag_name]);

    return redirect()->route('create_tag')->with('message','Tag updated successfully!');
  }
}
