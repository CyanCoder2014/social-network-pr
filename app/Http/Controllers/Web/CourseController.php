<?php

namespace App\Http\Controllers\Web;

use App\Web\CourseModel;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Web\ContentModel;
use App\Web\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{


    public function __construct()
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');

    }


    public function index()
    {

        $contents = CourseModel::orderby('id', 'desc')->paginate(100);

        return View('web.admin.course.sort', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = ['' => 'دسته بندی ها'] + CategoryModel::orderby('id', 'desc');
        $contents = CourseModel::orderby('id', 'desc')->get();


        return View('web.admin.course.add', ['contents' => $contents]);
    }


    public function store(Request $request)
    {
        $content = new CourseModel($request->all());

        if ($request->images !== null) {
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $content->images = $FileName;
        }

        $content->startDate = date('m-d-Y H:i:s', time());

        $content->save();

        return redirect('admin/course')->with('message', 'دوره با موفقیت ثبت شد');
    }

    public function edit($id)
    {

        $record = CourseModel::find($id);
        return View('web.admin.course.edit', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
        //$re = ContentModel::find($id);



        CourseModel::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'text'    =>  $request->text,
            'link'    =>  $request->link,
            'valency'    =>  $request->valency,
            'registered'    =>  $request->registered,
            'hour'    =>  $request->hour,
            'content'    =>  $request->content_c,
            'price'    =>  $request->price,
            'publish'    =>  $request->publish,


        ));

            return redirect('admin/course')->with('message', 'دوره با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $delete = CourseModel::find($id)->delete();
        return redirect('admin/course')->with('message', 'دوره با موفقیت حذف شد');
    }


}
