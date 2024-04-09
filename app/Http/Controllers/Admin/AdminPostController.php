<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Auth;
use DB;

class AdminPostController extends Controller
{
    public function post_show_ajax(){
         $posts = Post::with('rSubCategory.rCategory')->get();
       return view('admin.Post.post_show', compact('posts'));
    }
    public function post_create_ajax()
    {
        $sub_categories =SubCategory::with('rCategory')->get();
        return view('admin.Post.post_create', compact('sub_categories'));
    }
public function post_store_ajax(Request $request)
{
    // Validate the request data
    $request->validate([
        'sub_category_id' => 'required|exists:sub_categories,id',
        'post_title' => 'required',
        'post_photo' => 'image|mimes:jpg,jpeg,png,gif|max:2048', // Adjust the max file size as needed
    ]);

    // Check if a file has been uploaded
    if ($request->hasFile('post_photo')) {
        $file = $request->file('post_photo');

        // Generate a unique filename
        $fileName = 'post_photo_' . time() . '.' . $file->getClientOriginalExtension();

        // Move the uploaded file to the 'uploads' directory
        $file->move(public_path('uploads'), $fileName);

        // Save the post with the file information
        $post = new Post();
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail ?? '';
        $post->post_photo = $fileName; // Save the filename, not the URL
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->save();

        return redirect()->route('admin_post_show_ajax')->with('success', 'Data saved successfully');
    } else {
        return redirect()->back()->with('error', 'No image file provided.');
    }
}

    

    
        public function  post_edit_ajax($id){
        $sub_categories =SubCategory::with('rCategory')->get();
        $posts_EDIT = Post::where('id', $id)->first();
       // $post = Post::with('tags')->findOrFail($id);
        return view('admin.Post.post_edit', compact('posts_EDIT', 'sub_categories'));
    }
 
    
    public function post_update_ajax(Request $request, $id) {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_detail' => 'required|max:65535', // or another appropriate maximum length

        ]);
    
        $maxPostDetailLength = 255;
        $truncatedPostDetail = substr($request->post_detail, 0, $maxPostDetailLength);
    
        $post = Post::find($id); // Use find() to retrieve the post by ID
        
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
    
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail= $request->post_detail;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
     
        $post->update();
    
   
    

        return redirect()->route('admin_post_show_ajax')->with('success' ,'Data is Update Successfully.');   
    }//end method update
  

    public function post_delete_ajax($id){
        $post = Post::find($id);
    
        if (!$post) {
            return redirect()->route('admin_post_show_ajax')->with('error', 'Post not found.');
        }
    
        if ($post->post_photo) {
            $postPhotoPath = public_path('uploads/' . $post->post_photo);
    
            if (file_exists($postPhotoPath)) {
                unlink($postPhotoPath);
            }
        }
    
        $post->delete();
    
        return redirect()->route('admin_post_show_ajax')->with('success', 'Post and associated image (if it exists) deleted successfully.');
    }
    
}
