<?php

namespace App\Http\Controllers\Web;

use App\Web\Products;
use App\Web\ProductsCats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('UserMiddleware');

    }


    public function index()
    {

        $categories = ProductsCats::orderby('id', 'desc')->get();
        $contents = Products::orderby('id', 'desc')->paginate(10);



        return View('web.admin.products.sort', ['contents' => $contents, 'categories' => $categories]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = ['' => 'دسته بندی ها'] + CategoryModel::orderby('id', 'desc');
        $categories = ProductsCats::orderby('id', 'desc')->paginate(50);

        return View('web.admin.products.add', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title.fa'=>'required',
            'description.fa'=>'required',
        ]);



        $images=[];
        if ($request->input('Pimages'))
            foreach ($request->input('Pimages') as $item)
                $images[]=$item;

        $titles=[];
        foreach ($request->input('title') as $lang => $title)
            $titles[$lang]=$title;


        $descriptions=[];
        foreach ($request->input('description') as $lang => $description)
            $descriptions[$lang]=$description;




        $feature=[];
        $fdesc=$request->input('fdesc');
        if ($request->input('ftitle'))
        foreach ($request->input('ftitle') as $lang => $items)
            foreach ($items as $key => $item){
                if(!isset($feature[$lang]))
                    $feature[$lang]=[];
                $feature[$lang][$item]=$fdesc[$lang][$key];
            }

        $content = new Products();
        $content->cat=$request->catid;
        $content->images=$images;
        $content->meta=$feature;
        $content->title=$titles;
        $content->description=$descriptions;

        $content->save();

        return redirect(route('product.index'))->with('message', 'مطلب شما با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $categories = ProductsCats::orderby('id', 'desc')->paginate(50);
        $record = Products::find($id);
        return View('admin.products.edit', ['content' => $record, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title.fa'=>'required',
            'description.fa'=>'required',
        ]);



        $images=[];
        if ($request->input('Pimages'))
        foreach ($request->input('Pimages') as $item)
            $images[]=$item;

        $titles=[];
        foreach ($request->input('title') as $lang => $title)
            $titles[$lang]=$title;


        $descriptions=[];
        foreach ($request->input('description') as $lang => $description)
            $descriptions[$lang]=$description;




        $feature=[];
        $fdesc=$request->input('fdesc');
        if ($request->input('ftitle'))
            foreach ($request->input('ftitle') as $lang => $items)
                foreach ($items as $key => $item){
                    if(!isset($feature[$lang]))
                        $feature[$lang]=[];
                    $feature[$lang][$item]=$fdesc[$lang][$key];
                }

        $content = Products::find($id);
        $content->cat=$request->catid;
        $content->images=$images;
        $content->meta=$feature;
        $content->title=$titles;
        $content->description=$descriptions;

        $content->save();

        return redirect(route('product.index'))->with('message', 'مطلب شما با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $delete = Products::destroy($id);
        return redirect(route('product.index'))->with('message', 'مطلب شما با موفقیت حذف شد');
    }


    public function category($url)
    {

        $categories = PrCategoryModel::orderby('id', 'desc')->paginate(70);

        $contents = ProjectModel::where('catid', $url)->orderby('id', 'desc')->paginate(10);


        return View('web.admin.projects.sort', ['contents' => $contents, 'categories' => $categories]);

    }
}
