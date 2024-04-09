<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Category;
use App\Models\NewsCategory;
use App\Models\News;
use App\Traits\PDFTrait;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\DSubCategory;
use Spatie\MediaLibrary\Models\Media;
use Barryvdh\DomPDF\PDF;
use App\Models\DCategory;

// use Barryvdh\DomPDF\PDF as PDF;

class SubCategoryController extends Controller
{
    use PDFTrait;
    // Make sure to include the Post model at the top of your controller

    public function index($id) {
        // Fetch navigation categories
        $nav = Category::with('rSubCategory')
            ->where('show_on_menu', 'Show')
            ->orderBy('category_order', 'asc')
            ->get();
    
        // Fetch subcategory data
        $sub_category_data = SubCategory::where('id', $id)->first();
    
        // Fetch post data
        $post_data = Post::where('sub_category_id', $id)->get();
    
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
        return view('front.sub_category', compact('sub_category_data', 'post_data', 'nav'));
    }
    

    
    public function newsdetail($id)
    {
        $newsPost = News::findOrFail($id);
        $relatedPosts = News::where('news_category_id', $newsPost->news_category_id)->take(5)->get();
    
        return view('front.news_post_detail', compact('newsPost', 'relatedPosts'));
    }
    

    public function showAllNews()
{
    $allNews = News::with('newsCategory')->get();

    return view('front.all_news', compact('allNews'));
}

public function downloadSubCategoryPDF(Request $request) {
    // Fetch the 'id' parameter from the request
    $id = $request->input('id');

    // Check if the 'id' parameter is present
    if (!$id) {
        return abort(404); // Or handle the situation accordingly
    }

    // Fetch subcategory data
    $subCategoryData = SubCategory::find($id);

    // Check if the subcategory data is found
    if (!$subCategoryData) {
        return abort(404); // Or handle the situation accordingly
    }

    // Fetch post data for the given subcategory
    $postData = Post::where('sub_category_id', $id)->get();

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
    $pdf = \PDF::loadView('front.pdf', compact('subCategoryData', 'postData'));
 
    return $pdf->download('front.pdf');
}

public function showSubcategories($category_name)
{
    // Find the distributor category based on the provided category_name
    $distributorCategory = DCategory::where('category_name', $category_name)->firstOrFail();

    // Retrieve the related d_sub_categories
    $subcategories = $distributorCategory->rSubCategory;

    return view('front.home', compact('distributorCategory', 'subcategories'));
}
public function showproducts($category_name)
{
    // Find the distributor category based on the provided category_name
    $distributorCategory = Category::where('category_name', $category_name)->firstOrFail();

    // Retrieve the related d_sub_categories
    $subcategories = $distributorCategory->rSubCategory;

    return view('front.products', compact('distributorCategory', 'subcategories'));
}


}
