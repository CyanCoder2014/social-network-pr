<?php

namespace App\Providers;

use App\Web\CategoryModel;
use App\Web\Menu;
use App\Web\Products;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Web\Utility;
use App\Web\ProjectModel;
use App\Web\ContentModel;
use App\Web\PrCategoryModel;

class LayoutProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['web.layouts.layout2','web.layouts.layout','web.layouts.home_layout2','web.auth.login'], function (View $view) {
            $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
            $contact=Utility::where('type',"contact")->orderBy('id', 'desc')->first();
            $footer_title=Utility::where('type',"footer_title")->first();
            $footer_1=Utility::where('type',"footer_1")->get();
            $footer_2=Utility::where('type',"footer_2")->get();
            $footer_3=Utility::where('type',"footer_3")->get();
            $projects = ProjectModel::orderby('id','desc')->paginate(3);
            $products = Products::orderby('id','desc')->paginate(3);
            $contents = ContentModel::where('catid','1')->where('publish','0')->where('f_page','1')->orderby('id','desc')->paginate(3);

            $menus = Menu::where('parent_id',0)->where('active',1)->get();


            $view->with(['setting' => $setting,
                'contact' => $contact,
                'projects'=> $projects,
                'contents'=>$contents,
                'menus' =>$menus,
                'products' =>$products,
                'footer_title' =>$footer_title,
                'footer_1' =>$footer_1,
                'footer_2' =>$footer_2,
                'footer_3' =>$footer_3,
            ]);
        });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
