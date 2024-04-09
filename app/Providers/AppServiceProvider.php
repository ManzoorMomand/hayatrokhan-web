<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\Category;
use App\Models\Social_Item;
use App\Models\setting;
use App\Models\SubCategory;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use App\Models\Video;
use App\Models\Live_Channel;
use App\Models\Slider;
use App\Models\DCategory;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()

    {
        
       Paginator::useBootstrap();
        // Paginator::useBootstrap();
       
        $categoryies = Category::where ('show_on_menu','Show')->orderBy('category_order','asc')->get();

        $categories = Category::with('rSubCategory')
        ->where('show_on_menu', 'Show')
        ->orderBy('category_order', 'asc')->get();
        $live_data = Live_Channel::get();
        $recent_news_data = Post::with('rSubCategory')->orderBy('id','desc')->get();
        $popular_news_data = Post::with('rSubCategory')->orderBy('visitors','desc')->get();

        $social_item_data = Social_Item::get();
        $setting_data = setting::where('id',1)->first();
      
        $DistCategory = DCategory::where ('show_on_menu','Show')->orderBy('category_order','asc')->get();

        $DdCategory = DCategory::with('rSubCategory')
        ->where('show_on_menu', 'Show')
        ->orderBy('category_order', 'asc')->get();
       

        view()->share('global_d_categories', $DdCategory);
        view()->share('global_categories', $categories);
        view()->share('global_live_data', $live_data);
        view()->share('global_recent_news_data', $recent_news_data);
        view()->share('global_popular_data', $popular_news_data);
        view()->share('global_social_item_data', $social_item_data);
        view()->share('global_setting_data', $setting_data);



        
    }
}
