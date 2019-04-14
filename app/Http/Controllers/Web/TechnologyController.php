<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Web\TechnologyModel;
use App\Web\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TechnologyController extends Controller
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

        $contents = TechnologyModel::orderby('id', 'desc')->paginate(10);



        return View('web.admin.technologies.sort', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = ['' => 'دسته بندی ها'] + CategoryModel::orderby('id', 'desc');
        $categories = TechnologyModel::orderby('id', 'desc')->paginate(50);
        $contents = TechnologyModel::orderby('id', 'desc')->get();


        return View('web.admin.technologies.add', ['contents' => $contents, 'categories' => $categories]);
    }


    public function store(Request $request)
    {
        $content = new TechnologyModel($request->all());

        if ($request->images !== null) {
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $content->images = $FileName;
        }

        $content->created = date('m-d-Y H:i:s', time());

        $content->save();

        return redirect('admin/technology')->with('message', 'مطلب شما با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $contents = TechnologyModel::orderby('id', 'desc')->paginate(10);
        $record = TechnologyModel::find($id);
        return View('web.admin.contents.edit', ['record' => $record,'contents' => $contents]);
    }

    public function update(Request $request, $id)
    {
        //$re = ContentModel::find($id);

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('images'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
    }

        TechnologyModel::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'introtext'    =>  $request->introtext,
            'fulltext'    =>  $request->fulltext,
            'title_fa'    =>  $request->title_fa,
            'introtext_fa'    =>  $request->introtext_fa,
            'fulltext_fa'    =>  $request->fulltext_fa,
            'catid'    =>  $request->catid,
            'author'    =>  $request->author,
            'author_fa'    =>  $request->author_fa,
            'images'    =>  $request->images,
            'modified'    =>  date('m-d-Y H:i:s', time()),
            'f_page'    =>  $request->f_page,
            'comment'    =>  $request->comment,
            'publish'    =>  $request->publish,
            'title_seo'    =>  $request->title_seo,
            'keyword_seo'    =>  $request->keyword_seo,
            'description_seo'    =>  $request->description_seo,
            'title_seo_fa'    =>  $request->title_seo_fa,
            'keyword_seo_fa'    =>  $request->keyword_seo_fa,
            'description_seo_fa'    =>  $request->description_seo_fa,

        ));

            return redirect('admin/technology')->with('message', 'مطلب شما با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $delete = TechnologyModel::find($id)->delete();
        return redirect('admin/technology')->with('message', 'مطلب شما با موفقیت حذف شد');
    }


    public function category($url)
    {


        $contents = TechnologyModel::where('catid', $url)->orderby('id', 'desc')->paginate(10);


        return View('web.admin.technologies.sort', ['contents' => $contents]);

    }
}
