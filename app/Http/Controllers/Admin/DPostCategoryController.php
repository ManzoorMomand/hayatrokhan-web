<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DPostCategory;
use App\Models\DCategory;
use App\Models\DSubCategory;
use Auth;
use DB;
class DPostCategoryController extends Controller
{
    public function post_show_ajax(){
        $posts = DPostCategory::with('rSubCategory.rCategory')->get();
      return view('admin.dPost.post_show', compact('posts'));
   }
   public function post_create_ajax()
   {
       $sub_categories =DSubCategory::with('rCategory')->get();
       return view('admin.dpost.post_create', compact('sub_categories'));
   }
   public function post_store_ajax(Request $request)
{
   // Validate the request data
   $request->validate([
       'post_title' => 'required',
       'post_photo' => 'image|mimes:jpg,jpeg,png,gif'
   ]);

   // Check if a file has been uploaded
   if ($request->hasFile('post_photo')) {
       $file = $request->file('post_photo');

       // Generate a unique filename
       $fileName = 'post_photo_' . time() . '.' . $file->getClientOriginalExtension();

       // Move the uploaded file to the 'uploads' directory
       $file->move(public_path('uploads'), $fileName);

       // Save the post with the file information
       $post = new DPostCategory();
       $post->d_sub_category_id = $request->d_sub_category_id;
       $post->post_title = $request->post_title;
       $post->post_detail = $request->post_detail ?? '';
       $post->post_photo = $fileName; // Save the filename, not the URL
       $post->visitors = 1;
       $post->author_id = 0;
       $post->admin_id = Auth::guard('admin')->user()->id;
       $post->save();

       return redirect()->route('admin_d_post_show_ajax')->with('success', 'Data saved successfully');
   } else {
       return redirect()->back()->with('error', 'No image file provided.');
   }
}

   

   
       public function  post_edit_ajax($id){
       $sub_categories =DSubCategory::with('rCategory')->get();
       $posts_EDIT = DPostCategory::where('id', $id)->first();
      // $post = Post::with('tags')->findOrFail($id);
       return view('admin.dPost.post_edit', compact('posts_EDIT', 'sub_categories'));
   }

   
   public function post_update_ajax(Request $request, $id) {
       $request->validate([
           'post_title' => 'required',
           'post_detail' => 'required',
           'post_detail' => 'required|max:65535', // or another appropriate maximum length

       ]);
   
       $maxPostDetailLength = 255;
       $truncatedPostDetail = substr($request->post_detail, 0, $maxPostDetailLength);
   
       $post = DPostCategory::find($id); // Use find() to retrieve the post by ID
       
       if ($request->hasFile('post_photo')) {
           $request->validate([
               'post_photo' => 'image|mimes:jpg,jpeg,png,gif',
           ]);
   
           if ($post->post_photo !== null) {
               unlink(public_path('uploads/' . $post->post_photo));
           }
   
           $now = time();
           $ext = $request->file('post_photo')->extension();
           $final_name = 'post_photo' . $now . '.' . $ext;
   
           $request->file('post_photo')->move(public_path('uploads/'), $final_name);
   
           $post->post_photo = $final_name;
       }
   
       $post->d_sub_category_id = $request->d_sub_category_id;
       $post->post_title = $request->post_title;
       $post->post_detail= $request->post_detail;
       $post->visitors = 1;
       $post->author_id = 0;
       $post->admin_id = Auth::guard('admin')->user()->id;
    
       $post->update();
   
  
   

       return redirect()->route('admin_d_post_show_ajax')->with('success' ,'Data is Update Successfully.');   
   }//end method update
 

   public function post_delete_ajax($id){
       $post = DPostCategory::find($id);
   
       if (!$post) {
           return redirect()->route('admin_d_post_show_ajax')->with('error', 'Post not found.');
       }
   
       if ($post->post_photo) {
           $postPhotoPath = public_path('uploads/' . $post->post_photo);
   
           if (file_exists($postPhotoPath)) {
               unlink($postPhotoPath);
           }
       }
   
       $post->delete();
   
       return redirect()->route('admin_d_post_show_ajax')->with('success', 'Post and associated image (if it exists) deleted successfully.');
   }
}
