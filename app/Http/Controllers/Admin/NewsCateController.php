<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Illuminate\Validation\Rule;

class NewsCateController extends Controller
{
    public function categoryShow()
    {
        $categories = NewsCategory::get();
        return view('admin.news_category.category_show', compact('categories'));
    }

    public function categoryCreate()
    {
        return view('admin.news_category.category_create');
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'news_category_name' => 'required',
        ]);

        $category = new NewsCategory();
        $category->news_category_name = $request->news_category_name;
        $category->save();

        return redirect()->route('admin_news_category_show')->with('success', 'Data saved successfully');
    }

    public function Category_edit($id)
    {
        $category = NewsCategory::findOrFail($id);
        return view('admin.news_category.category_edit', compact('category'));
    }

    public function Category_update(Request $request, $id)
    {
        $request->validate([
            'news_category_name' => 'required',
        ]);

        $category = NewsCategory::findOrFail($id);
        $category->news_category_name = $request->news_category_name;
        $category->save();

        return redirect()->route('admin_news_category_show')->with('success', 'Data updated successfully');
    }

    public function Category_delete($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin_news_category_show')->with('success', 'Data deleted successfully');
    }
}
