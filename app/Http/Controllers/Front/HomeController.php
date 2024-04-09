<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use App\Models\Video;
use App\Models\Category;
use App\Models\page;
use App\Models\Online_Poll;
use App\Models\News;
use App\Models\Slider;
use App\Models\team;



class HomeController extends Controller
{
    public function index(){
        $video_data = Video::get();
        $photos = Photo::get();
        $sliders = Slider::get();
        $team = team::get();

        $latest_news = News::latest()->take(3)->get();


        // $home_ad_data = HomeAdvertisement::where('id',1)->first();
        $setting_data = Setting::where('id',1)->first();
        $post_data = Post::orderBy('id','desc')->orderBy('id','desc')->paginate(4);
       
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->get();
        
        $category_data = Category::orderBy('category_order' , 'asc')->get();

       
        
        return view('home', compact('photos','team','latest_news','sliders','setting_data','post_data','sub_category_data','video_data','category_data'));
    }

    
    public function get_subcategory_by_category($id)
    {
        $sub_category_data = SubCategory::where('category_id', $id)->get();
        $response = "<option value=''>Select SubCategory</option>";
        foreach ($sub_category_data as $item) {
            $response .= '<option value="' . $item->id . '">' . $item->sub_category_name . '</option>';
        }
    
        return response()->json(['sub_category_data' => $response]);
    }
    
    
    

    public function photo(){
        $photos = Photo::get();
        $photos = DB::table('photos')->paginate(8);
        return view('front.Photo.photo_show', compact('photos', 'photos'));
    }

    public function video(){
        $videos = Video::paginate();
        return view('front.video.video-page', compact('videos')); // Pass the $videos variable to the view
    }
    

    public function poll(Request $request)
        {
       $poll_data =Online_Poll::where('id', $request->id)->first();
        if ($request->vote == 'Yes')
        {
            $updated_yes = $poll_data->yes_vote+1;
            $poll_data->yes_vote = $updated_yes;
        }
        else
        {
        $updated_no = $poll_data->no_vote+1;
            $poll_data->no_vote = $updated_no;

    }
    $poll_data->update();
    session()->put('current_poll_id',$poll_data->id);
    return redirect()->back()->with('success','Vote counted successfully');
}

public function poll_result(){
    $poll_data = Online_Poll::orderBy('id', 'desc')->get();
    return view('front.poll.poll_previews', compact('poll_data')); // Corrected variable name
}


    public function downloadCategory($id)
    {
        $category = CategoryDistributor::find($id);
        if ($category) {
            $pdfFilePath = public_path('path_to_pdf_files/' . $category->pdf_file);
            return response()->file($pdfFilePath, ['Content-Disposition' => 'attachment']);
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }
}

