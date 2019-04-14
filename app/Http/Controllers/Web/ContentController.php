<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Web\ContentModel;
use App\Web\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ContentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');

    }


    public function index()
    {

        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);
        $contents = ContentModel::orderby('id', 'desc')->paginate(200);



        return View('web.admin.contents.sort', ['contents' => $contents, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = ['' => 'دسته بندی ها'] + CategoryModel::orderby('id', 'desc');
        $categories = CategoryModel::orderby('id', 'desc')->paginate(50);
        $contents = ContentModel::orderby('id', 'desc')->get();


        return View('web.admin.contents.add', ['contents' => $contents, 'categories' => $categories]);
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
        $content = new ContentModel($request->all());
        $content->title_seo_fa = $request->input('title_seo_fa');
        $content->keyword_seo = $request->input('keyword_seo');
        $content->description_seo = $request->input('description_seo');
        $content->keyword_seo_fa = $request->input('keyword_seo_fa');
        $content->description_seo_fa = $request->input('description_seo_fa');

        $content->images = $request->input('images');

        $content->save();

        return redirect('admin/content')->with('message', 'مطلب شما با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $categories = CategoryModel::orderby('id', 'desc')->paginate(50);
        $contents = ContentModel::orderby('id', 'desc')->paginate(10);
        $record = ContentModel::find($id);
        return View('web.admin.contents.edit', ['record' => $record, 'categories' => $categories, 'contents' => $contents]);
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



        ContentModel::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'title_fa'    =>  $request->title_fa,
            'introtext_fa'    =>  $request->introtext_fa,
            'fulltext'    =>  $request->fulltext,
            'fulltext_fa'    =>  $request->fulltext_fa,
            'catid'    =>  $request->catid,
            'author'    =>  $request->author,
            'images'    =>  $request->images,
            'modified'    =>  date('Y-m-d H:i:s'),
            'f_page'    =>  $request->f_page,
            'comment'    =>  $request->comment,
            'publish'    =>  $request->publish,
            'publish_fa'    =>  $request->publish_fa,

        ));

            return redirect('admin/content')->with('message', 'مطلب شما با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $delete = ContentModel::find($id)->delete();
        return redirect('admin/content')->with('message', 'مطلب شما با موفقیت حذف شد');
    }


    public function category($url)
    {

        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);

        $contents = ContentModel::where('catid', $url)->orderby('id', 'desc')->paginate(10);


        return View('web.admin.contents.sort', ['contents' => $contents, 'categories' => $categories]);

    }
}
