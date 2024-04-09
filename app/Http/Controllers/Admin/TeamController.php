<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Models\team;
use App\Models\team;
use Auth;
use DB;

class TeamController extends Controller
{
    
        public function team_show_ajax()
        {
            $posts = team::get();
            return view('admin.Team.post_show', compact('posts'));
        }
    
        public function team_create_ajax()
        {
            return view('admin.Team.post_create');
        }
        
        public function team_store_ajax(Request $request)
        {
            $request->validate([
                'post_title' => 'required',
                'post_photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
        
            try {
                // Check if a file has been uploaded
                if ($request->hasFile('post_photo')) {
                    $file = $request->file('post_photo');
                    $now = time();
                    $ext = $file->getClientOriginalExtension();
                    $final_name = 'post_photo' . $now . '.' . $ext;
                    $file->move(public_path('uploads/'), $final_name);
                } else {
                    $final_name = null;
                }
        
                $post = new team();
                $post->post_title = $request->post_title;
                $post->post_detail = $request->post_detail ?? null;
                $post->post_photo = $final_name;
                $post->visitors = 1;
                $post->author_id = 0;
                $post->admin_id = Auth::guard('admin')->user()->id;
        
                $post->save();
        
                return redirect()->route('admin_team_show_ajax')->with('success', 'Data saved successfully');
            } catch (\Exception $e) {
                // Log the exception for debugging
                \Log::error($e);
        
                return redirect()->route('admin_team_show_ajax')->with('error', 'An error occurred while saving the data.');
            }
        }
        
        
    
        public function team_edit_ajax($id)
        {
            $post = team::find($id);
    
            if (!$post) {
                return redirect()->route('admin_team_show_ajax')->with('error', 'Post not found.');
            }
    
            return view('admin.Team.post_edit', compact('post'));
        }
    
        public function team_update_ajax(Request $request, $id)
        {
            $request->validate([
                'post_title' => 'required',
                'post_detail' => 'required|max:65535', // or another appropriate maximum length
            ]);
    
            $post = team::find($id);
    
            if (!$post) {
                return redirect()->route('admin_team_show_ajax')->with('error', 'Post not found.');
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
    
            $post->post_title = $request->post_title;
            $post->post_detail = $request->post_detail;
            $post->visitors = 1;
            $post->author_id = 0;
            $post->admin_id = Auth::guard('admin')->user()->id;
    
            $post->update();
    
            return redirect()->route('admin_team_show_ajax')->with('success', 'Data is updated successfully.');
        }
    
        public function team_delete_ajax($id)
        {
            $post = team::find($id);
    
            if (!$post) {
                return redirect()->route('admin_team_show_ajax')->with('error', 'Post not found.');
            }
    
            if ($post->post_photo) {
                $postPhotoPath = public_path('uploads/' . $post->post_photo);
    
                if (file_exists($postPhotoPath)) {
                    unlink($postPhotoPath);
                }
            }
    
            $post->delete();
    
            return redirect()->route('admin_team_show_ajax')->with('success', 'Post and associated image (if it exists) deleted successfully.');
        }
    }