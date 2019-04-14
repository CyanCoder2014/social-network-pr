<?php

namespace App\Http\Controllers\Web;

use App\Web\ProductsCats;
use Illuminate\Http\Request;

class ProductCatController extends Controller
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
        $categories = ProductsCats::orderby('id','desc')->paginate(50);
        return View('web.admin.products.cat.categories',['categories'=>$categories]);
    }


    public function create()
    {
        $categories = ProductsCats::orderby('id', 'desc')->get();

        return View('web.admin.products.cat.categories', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'title_fa'=>'required',

        ]);
        $content = new ProductsCats($request->all());
        $content->section=0;
        $content->image=$request->image;
        $content->save();

        return back()->with('message', 'دسته بندی شما با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $record = ProductsCats::find($id);
        return View('web.admin.products.cat.categories', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'title_fa'=>'required',

        ]);

        ProductsCats::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'title_fa'    =>  $request->title_fa,
            'image'    =>  $request->image


        ));

        return back()->with('message', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        ProductsCats::destroy($id);
        return back()->with('message', 'دسته بندی شما با موفقیت حذف شد');
    }
}
