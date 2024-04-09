<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DPostCategory;
use App\Models\DCategory;
use App\Models\DSubCategory;
class DSubCategoryController extends Controller
{
    public function sub_ategory_show()
    {
        $sub_categories = DSubCategory::with('rCategory')->orderBy('sub_category_order', 'asc')->get();
        return view('admin.dsub_category.sub_category_show', compact('sub_categories'));
    }

    public function sub_category_create()
    {
        $sub_categories = DCategory::all()->sortByDesc("id");
        return view('admin.dsub_category.sub_category_create', compact('sub_categories'));
    }

    
    public function sub_category_store(Request $request)
    {
        $request->validate([
            'd_sub_category_name' => 'required',
            'sub_category_order' => 'required',
            'post_photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Adjust the max size as needed
        ]);
    
        // Check if a file has been uploaded
        if ($request->hasFile('post_photo')) {
            $now = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo' . $now . '.' . $ext;
    
            $request->file('post_photo')->move(public_path('uploads/'), $final_name);
    
            // Combine text and image URL in the post_detail field
            $image_url = asset('uploads/' . $final_name);
    
            $sub_category = new DSubCategory();
            $sub_category->d_sub_category_name = $request->d_sub_category_name;
            $sub_category->show_on_menu = $request->show_on_menu;
            $sub_category->show_on_home = $request->show_on_home;
            $sub_category->sub_category_order = $request->sub_category_order;
            $sub_category->d_category_id = $request->d_category_id;
            $sub_category->post_photo = $final_name; // Store the file name in the database
            $sub_category->save();
    
            return redirect()->route('admin_d_sub_category_show')->with('success', 'Data is stored successfully.');
        } else {
            return redirect()->route('admin_d_sub_category_show')->with('error', 'No image file uploaded.');
        }
    }
    

    public function sub_Category_edit($id)
    {
        $categories = DCategory::orderBy('category_order', 'asc')->get();
        $sub_category = DSubCategory::where('id', $id)->first();
        return view('admin.dsub_category.sub_category_edit', compact('categories', 'sub_category'));
    }
    public function sub_Category_update(Request $request, $id)
    {
        $request->validate([
            'd_sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);
    
        $sub_category = DSubCategory::findOrFail($id); // Retrieve the sub_category by ID
    
        if ($request->hasFile('post_photo')) {
            // Delete the existing image file if it exists
            if ($sub_category->post_photo !== null) {
                $imagePath = public_path('uploads/' . $sub_category->post_photo);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Upload and store the new image file
            $now = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo' . $now . '.' . $ext;
    
            // Move the uploaded file to the uploads directory
            $request->file('post_photo')->move(public_path('uploads/'), $final_name);
    
            $sub_category->post_photo = $final_name; // Store the updated file name in the database
        }
    
        // Update other fields
        $sub_category->d_sub_category_name = $request->d_sub_category_name;
        $sub_category->show_on_menu = $request->show_on_menu;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->sub_category_order = $request->sub_category_order;
        $sub_category->d_category_id = $request->d_category_id;
        $sub_category->save(); // Use save() to save the model
    
        return redirect()->route('admin_d_sub_category_show')->with('success', 'Data is updated successfully.');
    }
    
    
    

    public function sub_Category_delete($id)
    {
        $sub_category = DSubCategory::find($id);
    
        if (!$sub_category) {
            return redirect()->route('admin_d_sub_category_show')->with('error', 'SubCategory not found.');
        }
    
        if ($sub_category->post_photo) {
            $postPhotoPath = public_path('uploads/' . $sub_category->post_photo);
    
            if (file_exists($postPhotoPath)) {
                unlink($postPhotoPath);
            }
        }
    
        $sub_category->delete();
    
        return redirect()->route('admin_d_sub_category_show')->with('success', 'SubCategory is deleted successfully.');
    }
}
