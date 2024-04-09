<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DPostCategory;
use App\Models\DCategory;
use App\Models\DSubCategory;
class DCategoryController extends Controller
{
    public function category_show(){
        $categories = DCategory::orderBy('category_order', 'asc')->get();
        return view('admin.dcategory.category_show', compact('categories'));
    }

    public function category_create()
    {
        // $categories = Category::get();
        return view('admin.dcategory.category_create');
    }

    public function category_store(Request $request){
       $request->validate([
        'category_name' => 'required',
        'category_order' => 'required'
       ]);
       $category = new DCategory();
       $category->category_name = $request->category_name;
       $category->show_on_menu = $request->show_on_menu;
       $category->category_order = $request->category_order;
       $category->save();
       return redirect()->back()->with('success', 'Data save successfully ');
    }

    public function  Category_edit($id){
        $category = DCategory::where('id', $id)->first();
        return view('admin.dcategory.Category_edit', compact('category'));
    }
    public function Category_update(Request $request , $id){
        $categories = DCategory::where('id', $id)->first();

        $categories->category_name = $request->category_name;
        $categories->show_on_menu = $request->show_on_menu;

        $categories->category_order = $request->category_order;
        $categories->update();

        return redirect()->back()->with('success' ,'Data is store Successfully.');
    }

    public function Category_delete($id){

        $categories = DCategory::where('id', $id)->first();
            $categories->delete();
            return redirect()->back()->with('success' ,'Data is store Successfully.');
    }
}
