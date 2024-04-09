<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Slider;
    use Image;
    
class SliderController extends Controller
{
    
   
        public function index()
        {
            $images = Slider::all();
            return view('slider.index', compact('images'));
        }
    
        public function create()
        {
            return view('slider.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $imagePath = 'uploads/';
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path($imagePath), $imageName);
    
            $slider = new Slider([
                'title' => $request->get('title'),
                'image' => $imagePath . $imageName,
            ]);
    
            $slider->save();
    
            return redirect('/slider')->with('success', 'Image uploaded successfully!');
        }
    }
    

