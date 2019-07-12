<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
  //Dashboard - show category
  public function create_category(){
    $categories = Categories::all();
    return view('create_category')->with('categories',  $categories);
  }
  //Dashboard - save category
  public function save_cat(Request $request){
    $request->validate([
      'category_name' => 'unique:categories'
    ]);
    $categories = new Categories;
    $categories->category_name = $request->category_name;
    $categories->save();
    return redirect::back()->with('message','Category created successfully!');
  }
  //Dashboard - delete category
  public function delete_cat($id){
    $categories = Categories::find($id);
    $val = $categories->category_name;
    $posts = DB::table('posts')
                ->where('category_id', $val)
                ->update(['category_id' => ' ']);

    $categories = Categories::find($id);
    $categories->delete();

    return redirect::back()->with('message','Category deleted successfully!');
  }
  //Dashboard - edit category
  public function edit_cat($id){
    $categories = Categories::all();
    $categories_e = Categories::find($id);

    return view('category_edit')->with('categories_e',$categories_e)->with('categories',  $categories);
  }
  //Dashboard - update category
  public function update_cat(Request $request, $id){
    $request->validate([
      'category_name' => 'unique:categories'
    ]);
    $categories_e = Categories::find($id);

    $categories_o = $categories_e->category_name;
    $categories_e->category_name = $request->category_name;
    $categories = DB::table('categories')
                ->where('category_name', $categories_o)
                ->update(['category_name' => $categories_e->category_name]);

    return redirect()->route('create_category')->with('message','Comment updated successfully!');
  }
}
