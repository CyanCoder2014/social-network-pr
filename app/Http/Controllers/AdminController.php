<?php

namespace App\Http\Controllers;

use App\Contents\Content;
use App\Contents\CourseCat;
use App\Contents\EventCat;
use App\Contents\FileCat;
use App\Contents\ForumCat;
use App\Contents\Post;
use App\Repositories\Content\ContentRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public $post;
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function listCat2()
    {
        $categories = ForumCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list',['categories'=>$categories]);

    }


    public function addCat2(Request $request)
    {

        $content = new ForumCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;

        }

        $content->save();
        $categories = ForumCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateCat2(Request $request, $id)
    {

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        ForumCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,

        ));
        $categories = ForumCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyCat2($id)
    {
        $delete = ForumCat::find($id)->delete();
        $categories = ForumCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }


















    public function listCat3()
    {
        $categories = FileCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list3',['categories'=>$categories]);

    }


    public function addCat3(Request $request)
    {

        $content = new FileCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;
        }

        $content->save();
        $categories = FileCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateCat3(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        FileCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,
        ));

        $categories = FileCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyCat3($id)
    {
        $delete = FileCat::find($id)->delete();
        $categories = FileCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }









    public function listCat4()
    {
        $categories = EventCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list4',['categories'=>$categories]);

    }


    public function addCat4(Request $request)
    {

        $content = new EventCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;
        }

        $content->save();
        $categories = EventCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateCat4(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        EventCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,
        ));

        $categories = EventCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyCat4($id)
    {
        $delete = EventCat::find($id)->delete();
        $categories = EventCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }








    public function listCat5()
    {
        $categories = CourseCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list2',['categories'=>$categories]);

    }


    public function addCat5(Request $request)
    {

        $content = new CourseCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;

        }

        $content->save();
        $categories = CourseCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateCat5(Request $request, $id)
    {

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        CourseCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,

        ));
        $categories = ForumCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyCat5($id)
    {
        $delete = CourseCat::find($id)->delete();
        $categories = CourseCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }






    public function index()
    {
        $contents = Content::orderby('id','desc')->paginate(20);

        return View('admin.contents.manage',['contents'=>$contents]);
    }


    public function create(Request $request)
    {
        $content = new Content($request->all());
        $content->save();

        return back()->with('message', 'صفحه  با موفقیت اضافه شد');
    }


    public function update(Request $request, $id)
    {
        Content::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'intro'    =>  $request->intro,
        ));

        return back()->with('message', 'صفحه با موفقیت ویرایش شد');
    }


    public function destroy($id)
    {
        $delete = Content::find($id)->delete();

        return back()->with('message', 'صفحه با موفقیت حذف شد');
    }












    public function postManage()
    {
        $contents = Post::orderby('id','desc')->paginate(20);

        return View('admin.contents.posts',['contents'=>$contents]);
    }



    public function postAllow($id)
    {
        Post::where('id', $id)->update(array(
            'state'    =>  '1',
        ));

        return back()->with('message', 'وضعیت پست با موفقیت تغییر کرد');
    }


    public function postDismiss($id)
    {
        Post::where('id', $id)->update(array(
            'state'    =>  '0',

        ));

        return back()->with('message', 'وضعیت پست با موفقیت تغییر کرد');
    }


    public function postDelete($id)
    {
        $delete = Post::find($id)->delete();

        return back()->with('message', 'پست با موفقیت حذف شد');
    }

}
