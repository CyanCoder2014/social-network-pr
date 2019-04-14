<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Web\MessageModel;
use App\Web\TicketModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\User;

use App\Web\ContentModel;
use App\Web\CategoryModel;
use App\Web\TeacherModel;


class AdminController extends Controller
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
        $contents = ContentModel::orderby('id','desc')->paginate(5);
        $tickets = TicketModel::orderby('id','desc')->paginate(5);
        $messages = MessageModel::orderby('id','desc')->paginate(4);

        return View('web.admin.index',['contents'=>$contents , 'categories'=>$categories , 'tickets'=>$tickets , 'messages'=>$messages]);
    }




    public function teacher_add(Request $request)
    {

        $content = new ContentModel($request->all());

        if ($request->images !== null) {
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $content->images = $FileName;
        }

        $content->alias = date('m-d-Y H:i:s', time());

        $content->save();


        return redirect('admin/content')->with('message', 'مطلب شما با موفقیت ثبت شد');


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



        ContentModel::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'introtext'    =>  $request->introtext,
            'fulltext'    =>  $request->fulltext,
            'catid'    =>  $request->catid,
            'author'    =>  $request->author,
            'images'    =>  $request->images,
            'modified'    =>  $request->alias,
            'f_page'    =>  $request->f_page,
            'comment'    =>  $request->comment,
            'publish'    =>  $request->publish,

        ));



        return redirect('admin/content')->with('message', 'مطلب شما با موفقیت ویرایش شد');

    }
    public function deny(){

        return view('admin.error');
    }
}
