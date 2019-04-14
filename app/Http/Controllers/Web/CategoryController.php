<?php

namespace App\Http\Controllers\Web;

use App\Web\CategoryModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function __construct()
    {
        // Auth::user()->lastvisitDate = date('m-d-Y H:i:s', time());
        //$user = new User(Auth::user()->lastvisitDate);
        // $user->save();

        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }

    public function index()
    {
        $categories = CategoryModel::orderby('id','desc')->paginate(50);
        return View('admin.section.categories',['categories'=>$categories]);
    }


    public function create()
    {
        $categories = CategoryModel::orderby('id', 'desc')->get();

        return View('admin.contents.add', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'title_fa'=>'required',

        ]);
        $content = new CategoryModel($request->all());



        $content->save();

        return redirect('admin/category')->with('message', 'دسته بندی شما با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $record = CategoryModel::find($id);
        return View('admin.section.categories', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'title_fa'=>'required',

        ]);

        CategoryModel::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'title_fa'    =>  $request->title_fa,
            'section'    =>  $request->section,

        ));

        return redirect('admin/category')->with('message', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $delete = CategoryModel::find($id)->delete();
        return redirect('admin/category')->with('message', 'دسته بندی شما با موفقیت حذف شد');
    }

}
