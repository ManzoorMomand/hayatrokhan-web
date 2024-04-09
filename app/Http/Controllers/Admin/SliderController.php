<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function show(){

        $sliders = Slider::get();
        return view('admin.Slider.Slider', compact('sliders'));
    }

    public function create()
        {
            // $categories = Category::get();
            return view('admin.Slider.Slider_create');
        }

  

        public function store(Request $request)
        {
            $request->validate([
                'caption' => 'required',
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
            ]);
        
            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'photo' . $now . '.' . $ext;
        
            $request->file('photo')->move(public_path('uploads/'), $final_name);
        
            $photos = new Slider();
            $photos->photo = $final_name;
            $photos->caption = $request->caption;
            $photos->save();
        
            return redirect()->route('admin_slider_show')->with('success', 'Updated successfully');
        }
        
    

        
public function edit($id)
{
    $slider = Slider::findOrFail($id); // Fetch the Slider by its ID
    return view('admin.Slider.Slider_edit', compact('slider'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'caption' => 'required',
        'photo' => 'image|mimes:jpg,jpeg,png,gif'
    ]);

    $photo = Slider::findOrFail($id);

    if ($request->hasFile('photo')) {
        // If a new photo was uploaded, update the photo file
        $file = $request->file('photo');
        $now = time();
        $ext = $file->getClientOriginalExtension();
        $final_name = 'photo' . $now . '.' . $ext;
        $file->move(public_path('uploads/'), $final_name);

        // Delete the old photo file
        if ($photo->photo) {
            unlink(public_path('uploads/' . $photo->photo));
        }

        $photo->photo = $final_name;
    }

    $photo->caption = $request->caption;
    $photo->save();

    return redirect()->route('admin_slider_show')->with('success', 'Slider updated successfully');
}


// ...

public function delete($id)
{
    $slider = Slider::findOrFail($id);
    
    // Delete the slider file
    if ($slider->slider) {
        File::delete(public_path('uploads/' . $slider->slider));
    }

    $slider->delete();

    return redirect()->route('admin_slider_show')->with('success', 'Slider deleted successfully');
}


    //


}


