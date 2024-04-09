<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\team;
class PageController extends Controller
{
    public function about()
    {
        $page_data = Page::first();
        return view('front.about', compact('page_data'));
    }
    
    public function team()
    {
        $team = team::get();
        return view('front.team.team', ['team' => $team]);
    }


    public function contact(){

         $contact = Page::where('id', 1)->first();
        return view('front.contact');
    }

  
}
