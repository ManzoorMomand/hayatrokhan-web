<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Auth;
use App\Models\NewsCategory;
class NewsPostController extends Controller
{
    public function post_show()
    {
        $posts = News::with('newsCategory')->get();
        return view('admin.news.post_show', compact('posts'));
    }

    public function post_create()
    {
        $news_categories = NewsCategory::all();
        return view('admin.news.post_create', compact('news_categories'));
    }
    
    public function post_store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            // 'post_detail' => 'required|max:65535',
            'post_photo' => 'image|mimes:jpg,jpeg,png,gif',
        ]);
    
        try {
            $now = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo' . $now . '.' . $ext;
    
            // Check if a file has been uploaded
            if ($request->hasFile('post_photo')) {
                $request->file('post_photo')->move(public_path('uploads/'), $final_name);
            }
    
            $post = new News();
            $post->news_category_id = $request->news_category_id;
            $post->post_title = $request->post_title;
            $post->post_detail = $request->post_detail;
            $post->post_photo = $final_name;
            $post->visitors = 1;
            $post->author_id = 0;
            $post->admin_id = Auth::guard('admin')->user()->id;
    
            $post->save();
    
            return redirect()->route('admin_news_show_ajax')->with('success', 'Data saved successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);
    
            return redirect()->route('admin_news_show_ajax')->with('error', 'An error occurred while saving the data.');
        }
    }
    

    public function post_edit($id)
    {
        $sub_categories = NewsCategory::all();
        $post = News::find($id);

        if (!$post) {
            return redirect()->route('admin_news_show_ajax')->with('error', 'Post not found.');
        }

        return view('admin.news.post_edit', compact('post', 'sub_categories'));
    }

    public function post_update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required|max:65535', // or another appropriate maximum length
        ]);

        $post = News::find($id);

        if (!$post) {
            return redirect()->route('admin_news_show_ajax')->with('error', 'Post not found.');
        }

        if ($request->hasFile('post_photo')) {
            $request->validate([
                'post_photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);

            $now = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'news_photo' . $now . '.' . $ext;

            $request->file('post_photo')->move(public_path('uploads/'), $final_name);

            if ($post->post_photo) {
                $postPhotoPath = public_path('uploads/' . $post->post_photo);
                if (file_exists($postPhotoPath)) {
                    unlink($postPhotoPath);
                }
            }

            $post->post_photo = $final_name;
        }

        $post->news_category_id = $request->news_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;

        $post->update();

        return redirect()->route('admin_news_show_ajax')->with('success', 'Data is updated successfully.');
    }

    public function post_delete($id)
    {
        $post = News::find($id);

        if (!$post) {
            return redirect()->route('admin_news_show_ajax')->with('error', 'Post not found.');
        }

        if ($post->post_photo) {
            $postPhotoPath = public_path('uploads/' . $post->post_photo);

            if (file_exists($postPhotoPath)) {
                unlink($postPhotoPath);
            }
        }

        $post->delete();

        return redirect()->route('admin_news_show_ajax')->with('success', 'Post and associated image (if it exists) deleted successfully.');
    }
}
