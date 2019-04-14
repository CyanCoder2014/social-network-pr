<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Web\PrCategoryModel;

use App\Http\Requests;

class PrCategoryController extends Controller
{

    public function __construct()
    {
        // Auth::user()->lastvisitDate = date('m-d-Y H:i:s', time());
        //$user = new User(Auth::user()->lastvisitDate);
        // $user->save();

        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PrCategoryModel::orderby('id','desc')->paginate(50);
        return View('web.admin.section.pr_categories',['categories'=>$categories]);
    }


    public function create()
    {
        $categories = PrCategoryModel::orderby('id', 'desc')->get();

        return View('web.admin.section.pr_categories', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'title_fa'=>'required',

        ]);
        $content = new PrCategoryModel($request->all());
        $content->section=$request->section;

        $content->created = date('m-d-Y H:i:s', time());

        $content->save();

        return redirect('admin/prcategory')->with('message', 'دسته بندی شما با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $record = PrCategoryModel::find($id);
        return View('web.admin.section.pr_categories', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'title_fa'=>'required',

        ]);

        PrCategoryModel::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'title_fa'    =>  $request->title_fa,
            'section'    =>  $request->section,

        ));

        return redirect('admin/prcategory')->with('message', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $delete = PrCategoryModel::find($id)->delete();
        return redirect('admin/prcategory')->with('message', 'دسته بندی شما با موفقیت حذف شد');
    }
}
