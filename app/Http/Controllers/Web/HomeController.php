<?php

namespace App\Http\Controllers\Web;

use App\Web\Delegate;
use App\Http\Controllers\Controller;
use App\Web\ManagerModel;
use App\Web\PrCategoryModel;
use App\Web\Products;
use App\Web\ProductsCats;
use App\Web\Utility;
use Illuminate\Http\Request;
use App\Web\ContentModel;
use App\Web\CategoryModel;
use App\Web\CommentModel;
use App\Web\ProjectModel;
use App\Web\SectionModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
        $utility=array();
        $utility['about_us']=Utility::where('type',"about_us")->orderBy('id', 'desc')->first();
        $utility['contact']=Utility::where('type',"contact")->orderBy('id', 'desc')->first();
        $utility['footer_title']=Utility::where('type',"footer_title")->orderBy('id', 'desc')->first();
        $utility['service2']=Utility::where('type',"service2")->orderBy('id', 'desc')->get();
        $utility['service3']=Utility::where('type',"service3")->orderBy('id', 'desc')->get();
        $utility['service1']=Utility::where('type',"service1")->orderBy('id', 'desc')->take(6)->get();
        $utility['skill']=Utility::where('type',"skill")->orderBy('id', 'desc')->take(6)->get();
        $utility['team']=Utility::where('type',"team")->orderBy('id', 'desc')->take(6)->get();
        $utility['slider']=Utility::where('type',"slider")->orderBy('id', 'desc')->take(6)->get();
        $utility['slider_2']=Utility::where('type',"slider_2")->orderBy('id', 'desc')->take(8)->get();
        $utility['slider_3']=Utility::where('type',"slider_3")->orderBy('id', 'desc')->take(6)->get();
        $utility['customers']=Utility::where('type',"customers")->orderBy('id', 'desc')->take(10)->get();
        $utility['faq']=Utility::where('type',"faq")->orderBy('id', 'desc')->take(5)->get();
        $delegates=Delegate::orderby('id','desc')->paginate(20);
        $productcats = ProductsCats::all();

        $projects = ProjectModel::orderby('id','desc')->paginate(4);
        $prcategories = PrCategoryModel::orderby('id','desc')->paginate(10);
        $contents = ContentModel::where('publish','0')->where('f_page','1')->orderby('id','desc')->paginate(3);


        return view('web.index' , ['utility'=> $utility,
            'setting' =>$setting,
            'prcategories'=>$prcategories,
            'projects'=>$projects,
            'contents'=>$contents,
            'delegates'=>$delegates,
            'productcats'=>$productcats,
        ]);
    }

    public function index2()
    {

        $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
        $utility=array();
        $utility['about_us']=Utility::where('type',"about_us")->orderBy('id', 'desc')->take(5)->get();
        $utility['service2']=Utility::where('type',"service2")->orderBy('id', 'desc')->take(4)->get();
        $utility['service1']=Utility::where('type',"service1")->orderBy('id', 'desc')->take(4)->get();
        $utility['skill']=Utility::where('type',"skill")->orderBy('id', 'desc')->take(4)->get();
        $utility['team']=Utility::where('type',"team")->orderBy('id', 'desc')->take(4)->get();
        $utility['slider']=Utility::where('type',"slider")->orderBy('id', 'desc')->take(4)->get();

        $projects = ProjectModel::orderby('id','desc')->paginate(10);
        $prcategories = PrCategoryModel::orderby('id','desc')->paginate(10);
        $contents = ContentModel::where('catid','1')->where('publish','0')->where('f_page','1')->orderby('id','desc')->paginate(3);


        return view('web.index2' , ['utility'=> $utility,'setting' =>$setting,'prcategories'=>$prcategories,'projects'=>$projects,'contents'=>$contents]);
    }


    public function content($url){





        $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
        $utility=array();
        $utility['about_us']=Utility::where('type',"about_us")->orderBy('id', 'desc')->first();

        $content = ContentModel::where('id',$url)->first();

//->where('published', '1')
        $comments = CommentModel::where('post_id',$url)->where('parent_id',null)->where('published',1)->orderby('id', 'desc')->paginate(100);

        $content_11 = ContentModel::where('catid','11')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_22 = ContentModel::where('catid','22')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_19 = ContentModel::where('catid','19')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_17 = ContentModel::where('catid','17')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_28 = ContentModel::where('catid','28')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_49 = ContentModel::where('catid','49')->where('publish','0')->orderby('id','desc')->paginate(4);

        $prcategories = PrCategoryModel::orderby('id', 'desc')->paginate(70);

        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);
        $utility['contact']=Utility::where('type',"contact")->orderBy('id', 'desc')->first();



        return view('web.contents.single' , [
            'utility'=> $utility,
            'setting' =>$setting,
            'categories'=>$categories ,
            'prcategories'=>$prcategories ,
            'content'=>$content ,
            'comments'=>$comments,
            'utility'=>$utility,
            'content_11'=>$content_11 ,
            'content_22'=>$content_22 ,
            'content_17'=>$content_17 ,
            'content_19'=>$content_19 ,
            'content_28'=>$content_28 ,
            'content_49'=>$content_49
        ] );

    }

    public function category($url){


        $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
        $utility=array();
        $utility['about_us']=Utility::where('type',"about_us")->orderBy('id', 'desc')->first();

        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);
        $cat = CategoryModel::find($url);

        $contents = ContentModel::where('catid',$url)->orderby('id','desc')->paginate(10);

        $content_11 = ContentModel::where('catid','11')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_22 = ContentModel::where('catid','22')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_19 = ContentModel::where('catid','19')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_17 = ContentModel::where('catid','17')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_28 = ContentModel::where('catid','28')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_49 = ContentModel::where('catid','49')->where('publish','0')->orderby('id','desc')->paginate(4);

        $prcategories = PrCategoryModel::orderby('id', 'desc')->paginate(70);


        return View('web.contents.category', [
            'utility'=> $utility,
            'setting' =>$setting,
            'prcategories'=>$prcategories ,
            'contents' => $contents,
            'categories' => $categories,
            'content_11'=>$content_11 ,
            'content_22'=>$content_22 ,
            'content_17'=>$content_17 ,
            'content_19'=>$content_19 ,
            'content_28'=>$content_28 ,
            'content_49'=>$content_49 ,
            'cat'=>$cat
        ]);

    }


    public function categories(){


        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);

        $contents = ContentModel::where('publish','0')->orderby('id','desc')->paginate(10);

        $content_11 = ContentModel::where('catid','11')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_22 = ContentModel::where('catid','22')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_19 = ContentModel::where('catid','19')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_17 = ContentModel::where('catid','17')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_28 = ContentModel::where('catid','28')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_49 = ContentModel::where('catid','49')->where('publish','0')->orderby('id','desc')->paginate(4);

        $prcategories = PrCategoryModel::orderby('id', 'desc')->paginate(70);


        return View('web.contents.category', [
            'prcategories'=>$prcategories ,
            'contents' => $contents,
            'categories' => $categories,
            'content_11'=>$content_11 ,
            'content_22'=>$content_22 ,
            'content_17'=>$content_17 ,
            'content_19'=>$content_19 ,
            'content_28'=>$content_28 ,
            'content_49'=>$content_49
        ]);

    }


    public function product($id)
    {
        $record = Products::find($id);
        $utility['contact']=Utility::where('type',"contact")->orderBy('id', 'desc')->first();

        return View('web.contents.product', ['content' => $record,'utility' =>  $utility]);
    }

    public function project($url){

        $content = ProjectModel::where('id',$url)->first();

        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);

        $content_11 = ContentModel::where('publish','0')->orderby('id','desc')->paginate(4);
        $content_12 = ProjectModel::where('catid',$content->catid)->where('publish','0')->orderby('id','desc')->paginate(4);
        $comments = CommentModel::where('post_id',$url)->where('parent_id',0)->orderby('id', 'desc')->paginate(100);

        $content_22 = ContentModel::where('catid','22')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_19 = ContentModel::where('catid','19')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_17 = ContentModel::where('catid','17')->where('publish','0')->orderby('id','desc')->paginate(4);

        $content_28 = ContentModel::where('catid','28')->where('publish','0')->orderby('id','desc')->paginate(4);
        $content_49 = ContentModel::where('catid','49')->where('publish','0')->orderby('id','desc')->paginate(4);

        $prcategories = PrCategoryModel::orderby('id', 'desc')->paginate(70);

        return view('web.contents.prsingle' , ['prcategories'=>$prcategories ,'content'=>$content,'comments'=>$comments,'categories'=>$categories,  'content_11'=>$content_11,  'content_12'=>$content_12 , 'content_11'=>$content_11 ,'content_22'=>$content_22 ,'content_17'=>$content_17 ,'content_19'=>$content_19 ,'content_28'=>$content_28 ,'content_49'=>$content_49] );

    }

    public function prprojects($url){

//        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);

        $contents = ProjectModel::where('catid',$url)->orderby('id','desc')->paginate(30);
        $prcategories = PrCategoryModel::where('id',$url)->orderby('id', 'desc')->paginate(70);
        $utility['contact']=Utility::where('type',"contact")->orderBy('id', 'desc')->first();

        return View('web.contents.prcategory',
            [
                'prcategories'=>$prcategories ,
                'contents' => $contents,
                'utility' => $utility,
                'catid' => $url
            ]);
    }

    public function projects(){

//        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);

        $contents = ProjectModel::orderby('id','desc')->paginate(30);
        $prcategories = PrCategoryModel::orderby('id', 'desc')->paginate(70);
        $utility['contact']=Utility::where('type',"contact")->orderBy('id', 'desc')->first();

        return View('web.contents.prcategory', ['prcategories'=>$prcategories ,'contents' => $contents,
            'utility' => $utility
        ]);
    }

    public function redirect(){
        if(Auth::guest())
            return redirect('/login');
        elseif (Auth::user()->usertype == 'Registered')
            return redirect('/');
        else
            return redirect('/admin');

    }
}
