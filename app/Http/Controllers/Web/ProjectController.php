<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Web\ProjectModel;
use App\Web\PrCategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('UserMiddleware');

    }


    public function index()
    {

        $categories = PrCategoryModel::orderby('id', 'desc')->paginate(70);
        $contents = ProjectModel::orderby('id', 'desc')->paginate(10);



        return View('web.admin.projects.sort', ['contents' => $contents, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = ['' => 'دسته بندی ها'] + CategoryModel::orderby('id', 'desc');
        $categories = PrCategoryModel::orderby('id', 'desc')->paginate(50);
        $contents = ProjectModel::orderby('id', 'desc')->get();


        return View('web.admin.projects.add', ['contents' => $contents, 'categories' => $categories]);
    }


    public function store(Request $request)
    {
        $validation=[];
        if($request->publish_fa == 0)
            $validation = array_merge($validation,[
                'title_fa'=>'required',
                'introtext_fa'=>'required',
                'fulltext_fa'=>'required',
                'author_fa'=>'required',
            ]);
        elseif ($request->publish == 0)
            $validation = array_merge($validation,[
                'title'=>'required',
                'introtext'=>'required',
                'fulltext'=>'required',
                'author'=>'required',
            ]);
        else
            return back()->with('warning','حداقل یکی از قسمت های فارسی یا انگلیسی قابل انتشار باشد');
        $this->validate($request,$validation);

        $content = new ProjectModel($request->all());
        $content->images = $request->input('images');
        $images=[];
        if ($request->input('Pimages'))
            foreach ($request->input('Pimages') as $item)
                $images[]=$item;

        $content->pimages=$images;
        $content->video = $request->input('video');


        $content->created = date('Y-m-d H:i:s', time());

        $content->save();

        return redirect('admin/project')->with('message', 'مطلب شما با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $categories = PrCategoryModel::orderby('id', 'desc')->paginate(50);
        $contents = ProjectModel::orderby('id', 'desc')->paginate(10);
        $record = ProjectModel::find($id);
        return View('admin.projects.edit', ['record' => $record, 'categories' => $categories, 'contents' => $contents]);
    }

    public function update(Request $request, $id)
    {
        $validation=[];
        if($request->publish_fa == 0)
            $validation = array_merge($validation,[
                'title_fa'=>'required',
                'introtext_fa'=>'required',
                'fulltext_fa'=>'required',
                'author_fa'=>'required',
            ]);
        elseif ($request->publish == 0)
            $validation = array_merge($validation,[
                'title'=>'required',
                'introtext'=>'required',
                'fulltext'=>'required',
                'author'=>'required',
            ]);
        else
            return back()->with('warning','حداقل یکی از قسمت های فارسی یا انگلیسی قابل انتشار باشد');
        $this->validate($request,$validation);
        //$re = ContentModel::find($id);
        $images=[];
        if ($request->input('Pimages'))
            foreach ($request->input('Pimages') as $item)
                $images[]=$item;

//        ProjectModel::where('id', $id)->update(array(
//            'title'    =>  $request->title,
//            'introtext'    =>  $request->introtext,
//            'fulltext'    =>  $request->fulltext,
//            'title_fa'    =>  $request->title_fa,
//            'author'    =>  $request->author,
//            'author_fa'    =>  $request->author_fa,
//            'introtext_fa'    =>  $request->introtext_fa,
//            'fulltext_fa'    =>  $request->fulltext_fa,
//            'catid'    =>  $request->catid,
//
//            'images'    =>  $request->images,
//            'video'    =>  $request->video,
//
//
//            'modified'    =>  date('Y-m-d H:i:s'),
//            'f_page'    =>  $request->f_page,
//            'comment'    =>  $request->comment,
//            'publish'    =>  $request->publish,
//            'title_seo'    =>  $request->title_seo,
//            'keyword_seo'    =>  $request->keyword_seo,
//            'description_seo'    =>  $request->description_seo,
//            'title_seo_fa'    =>  $request->title_seo_fa,
//            'keyword_seo_fa'    =>  $request->keyword_seo_fa,
//            'description_seo_fa'    =>  $request->description_seo_fa,
//
//        ));
        $content= ProjectModel::find($id);
        $content->title =$request->title;
        $content->introtext =$request->introtext;
        $content->fulltext =$request->fulltext;
        $content->title_fa =$request->title_fa;
        $content->author =$request->author;
        $content->author_fa =$request->author_fa;
        $content->introtext_fa =$request->introtext_fa;
        $content->fulltext_fa =$request->fulltext_fa;
        $content->images =$request->images;
        $content->video =$request->video;
        $content->modified =    date('Y-m-d H:i:s');
        $content->f_page =$request->f_page;
        $content->comment =$request->comment;
        $content->publish =$request->publish;
        $content->pimages =$images;
        $content->save();

            return redirect('admin/project')->with('message', 'مطلب شما با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $delete = ProjectModel::find($id)->delete();
        return redirect('admin/project')->with('message', 'مطلب شما با موفقیت حذف شد');
    }


    public function category($url)
    {

        $categories = PrCategoryModel::orderby('id', 'desc')->paginate(70);

        $contents = ProjectModel::where('catid', $url)->orderby('id', 'desc')->paginate(10);


        return View('web.admin.projects.sort', ['contents' => $contents, 'categories' => $categories]);

    }
}
