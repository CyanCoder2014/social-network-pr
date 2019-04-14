<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\MessageModel;
use App\TicketModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\User;

use App\ContentModel;
use App\CategoryModel;
use App\TeacherModel;


class AdminPager
{
    public function __construct()
    {
        if ( Auth::check() ) {
            $this->middleware('BaseMiddleware');
        }$this->middleware('auth');
    }


    public function index($model , $section)
    {
        $teachers = $model::orderby('id', 'desc')->paginate(100);
        return View('admin.section.'.$section, ['teachers' => $teachers]);
    }



    public function teacher_add(Request $request)
    {

        $content = new TeacherModel($request->all());

        if ($request->images !== null) {
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $content->images = $FileName;
        }

        $content->save();

        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت اضافه شد');
    }


    public function teacher_edit(Request $request, $id)
    {
        //$re = ContentModel::find($id);

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }


        TeacherModel::where('id', $id)->update(array(
            'name'    =>  $request->name,
            'title'    =>  $request->title,
            'description'    =>  $request->description,
            'images'    =>  $request->images,
            'active'    =>  '1',
        ));

        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت ویرایش شد');

    }
    public function teacher_destroy($id)
    {
        $delete = TeacherModel::find($id)->delete();
        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت حذف شد');
    }






    public function _index()
    {

        $teachers = TeacherModel::orderby('id','desc')->paginate(4);

        return View('admin.section.teachers',['teachers'=>$teachers ]);
    }


    public function _add(Request $request)
    {

        $content = new TeacherModel($request->all());

        if ($request->images !== null) {
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $content->images = $FileName;
        }

        $content->save();

        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت اضافه شد');
    }


    public function _edit(Request $request, $id)
    {
        //$re = ContentModel::find($id);

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }


        TeacherModel::where('id', $id)->update(array(
            'name'    =>  $request->name,
            'title'    =>  $request->title,
            'description'    =>  $request->description,
            'images'    =>  $request->images,
            'active'    =>  '1',
        ));

        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت ویرایش شد');

    }
    public function _destroy($id)
    {
        $delete = TeacherModel::find($id)->delete();
        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت حذف شد');
    }






    public function about_index()
    {

        $teachers = TeacherModel::orderby('id','desc')->paginate(4);

        return View('admin.section.teachers',['teachers'=>$teachers ]);
    }


    public function about_add(Request $request)
    {

        $content = new TeacherModel($request->all());

        if ($request->images !== null) {
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $content->images = $FileName;
        }

        $content->save();

        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت اضافه شد');
    }


    public function about_edit(Request $request, $id)
    {
        //$re = ContentModel::find($id);

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }


        TeacherModel::where('id', $id)->update(array(
            'name'    =>  $request->name,
            'title'    =>  $request->title,
            'description'    =>  $request->description,
            'images'    =>  $request->images,
            'active'    =>  '1',
        ));

        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت ویرایش شد');

    }
    public function about_destroy($id)
    {
        $delete = TeacherModel::find($id)->delete();
        return redirect('admin/teacher')->with('message', 'مشخصات مدرس با موفقیت حذف شد');
    }
}
















