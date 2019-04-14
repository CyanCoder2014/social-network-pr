<?php

namespace App\Http\Controllers\Web;

use App\Web\CategoryModel;
use App\Menu;
use App\Web\PrCategoryModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function __construct()
    {
        // Auth::user()->lastvisitDate = date('m-d-Y H:i:s', time());
        //$user = new User(Auth::user()->lastvisitDate);
        // $user->save();

        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function index(){
        $menus = Menu::paginate(25);

        return view('web.admin.menu.sort',compact('menus'));

    }

    public function create(){
        $menus = Menu::all();
        $prcategories = PrCategoryModel::orderby('id','desc')->paginate(10);
        $categories = CategoryModel::orderby('id','desc')->paginate(10);

        return view('web.admin.menu.add',compact('menus','prcategories','categories'));

    }

    public function store(Request $request){

        if($request->type == 2 ||$request->type == 3)
            $rules = [
                'name.fa' => 'required',
                'name.en' => 'required',
                'parent_id' => 'required',
                'paginate' => 'required',
                'sort' => 'required',
            ];
        else
            $rules = [
                'name.fa' => 'required',
                'name.en' => 'required',
                'parent_id' => 'required',
                'link.fa' => 'required',
                'link.en' => 'required',
            ];

        $this ->validate($request,$rules);

        $new = new Menu($request->all());
        $new->deletable= 1;
        $new->save();

        return redirect(route('menu'))->with('message','منو با موفقیت ایجاد شد');




    }
    public function edit($id){
        $menus = Menu::all();
        $item = Menu::find($id);
        $prcategories = PrCategoryModel::orderby('id','desc')->paginate(10);
        $categories = CategoryModel::orderby('id','desc')->paginate(10);

        return view('web.admin.menu.edit',compact('menus','item','prcategories','categories'));


    }
    public function update($id,Request $request){
        if($request->type == 2 ||$request->type == 3)
            $rules = [
                'name.fa' => 'required',
                'name.en' => 'required',
                'parent_id' => 'required',
                'paginate' => 'required',
                'sort' => 'required',
            ];
        else
            $rules = [
                'name.fa' => 'required',
                'name.en' => 'required',
                'parent_id' => 'required',
                'link.fa' => 'required',
                'link.en' => 'required',
            ];

        $this ->validate($request,$rules);


        $new = Menu::find($id);

        if($request->type == 2 ||$request->type == 3){
            $new->paginate = $request->paginate;
            $new->sort = $request->sort;
        }
        else{
            $new->link = $request->link;
        }
        $new->parent_id = $request->parent_id;
        $new->name = $request->name;
        $new->type = $request->type;
        $new->active = $request->active;


        $new->save();

        return redirect(route('menu'))->with('message','منو با موفقیت ویرایش شد');
    }
    public function destroy($id){

        $state = Menu::where('id', $id)->where('deletable', 1)->delete();

        if($state)
            return redirect(route('menu'))->with('message','منو با موفقیت حذف شد');
        else
            return redirect(route('menu'))->with('error','نمیتوانید این قسمت را حذف کنید');




    }
}
