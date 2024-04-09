<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DPostCategory;
use App\Models\DCategory;
use App\Models\DSubCategory;
use App\Traits\PDFTrait;
use Intervention\Image\ImageManagerStatic as Image;
// use PDF;
use Spatie\MediaLibrary\Models\Media;
use Barryvdh\DomPDF\PDF;
class DistributorSubCategoryController extends Controller
{
    use PDFTrait;
    public function index($id) {
        // Fetch navigation categories
        $nav = DCategory::with('rSubCategory')
            ->where('show_on_menu', 'Show')
            ->orderBy('category_order', 'asc')
            ->get();
    
        // Fetch subcategory data
        $sub_category_data = DSubCategory::where('id', $id)->first();
    
        // Fetch post data
        $post_data = DPostCategory::where('d_sub_category_id', $id)->get();
    
        // Add icons to each item in $post_data
        foreach ($post_data as $item) {
            $item->icons = [
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/01-tavuk.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/02-hindi.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/03-dana.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/04-buzagi.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/12/12-domuz.png',
            ];
        }
    
        // Pass data to the view
        return view('front.d_sub_category', compact('sub_category_data', 'post_data', 'nav'));
    }

    public function downloadSubCategoryPDF(Request $request) {
        // Fetch the 'id' parameter from the request
        $id = $request->input('id');
    
        // Check if the 'id' parameter is present
        if (!$id) {
            return abort(404); // Or handle the situation accordingly
        }
    
        // Fetch subcategory data
        $subCategoryData = DSubCategory::find($id);
    
        // Check if the subcategory data is found
        if (!$subCategoryData) {
            return abort(404); // Or handle the situation accordingly
        }
    
        // Fetch post data for the given subcategory
        $postData = DPostCategory::where('d_sub_category_id', $id)->get();
    
        // Add icons to each item in $postData
        foreach ($postData as $item) {
            $item->icons = [
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/01-tavuk.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/02-hindi.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/03-dana.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/03/04-buzagi.png',
                'http://www.mistav.com.tr/en/wp-content/uploads/2019/12/12-domuz.png',
            ];
        }
        // $pdf = PDF::loadView('pdf');
    
        // return $pdf->download('itcodestuff.pdf');
        $pdf = \PDF::loadView('front.report.pdf', compact('subCategoryData', 'postData'));
     
        return $pdf->download('front.report.pdf');
    }
    
}
