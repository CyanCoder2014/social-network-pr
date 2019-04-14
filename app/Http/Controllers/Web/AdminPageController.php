<?php

namespace App\Http\Controllers\Web;


use App\Http\Requests;
use App\Web\MessageModel;
use App\Web\TicketModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\User;

use App\Web\ContentModel;
use App\Web\CategoryModel;
use App\Web\SectionModel;
use App\Web\ProjectModel;
use App\Web\TechnologyModel;
use App\Web\ManagerModel;


class AdminPageController extends Controller
{
    public function __construct()
    {
        // Auth::user()->lastvisitDate = date('m-d-Y H:i:s', time());
        //$user = new User(Auth::user()->lastvisitDate);
        // $user->save();

        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function page()
    {
        $contents = ContentModel::orderby('id', 'desc')->paginate(500);
        $projects = ProjectModel::orderby('id', 'desc')->paginate(500);
        //$technologies = TechnologyModel::orderby('id', 'desc')->paginate(500);

        return View('admin.section.pages', ['contents' => $contents, 'projects' => $projects,/* 'technologies' => $technologies*/]);
    }


    public function about()
    {
        $text = SectionModel::where('id', '2')->first();
        $text2 = SectionModel::where('id', '3')->first();
        $text3 = SectionModel::where('id', '4')->first();

        return View('admin.section.abouts', ['text' => $text, 'text2' => $text2, 'text3' => $text3]);
    }
    public function about_edit(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }
        SectionModel::where('id', $id)->update(array(
            'title' => $request->title,
            'title_fa' => $request->title_fa,
            'link' => $request->link,
            'link_fa' => $request->link_fa,
            'subtitle' => $request->subtitle,
            'subtitle_fa' => $request->subtitle_fa,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'image' => $request->images,
            'active' => '1',
        ));
        return redirect('admin/about')->with('message', 'مشخصات با موفقیت ویرایش شد');
    }


    public function slide()
    {
        $text = SectionModel::where('id', '5')->first();
        $text1 = SectionModel::where('id', '6')->first();
        $text2 = SectionModel::where('id', '7')->first();

        return View('admin.section.slides', ['text' => $text, 'text1' => $text1, 'text2' => $text2]);
    }
    public function slide_edit(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }
        SectionModel::where('id', $id)->update(array(
            'title' => $request->title,
            'title_fa' => $request->title_fa,
            'link' => $request->link,
            'link_fa' => $request->link_fa,
            'colored' => $request->colored,
            'colored_fa' => $request->colored_fa,
            'subtitle' => $request->subtitle,
            'subtitle_fa' => $request->subtitle_fa,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'image' => $request->images,
            'active' => '1',
        ));
        return redirect('admin/slide')->with('message', 'مشخصات با موفقیت ویرایش شد');
    }


    public function service()
    {
        $text8 = SectionModel::where('id', '8')->first();
        $text9 = SectionModel::where('id', '9')->first();
        $text10 = SectionModel::where('id', '10')->first();
        $text11 = SectionModel::where('id', '11')->first();
        $text12 = SectionModel::where('id', '12')->first();
        $text21 = SectionModel::where('id', '21')->first();

        return View('admin.section.services', [  'text21' => $text21, 'text8' => $text8, 'text9' => $text9, 'text10' => $text10, 'text11' => $text11, 'text12' => $text12]);
    }
    public function service_edit(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }
        SectionModel::where('id', $id)->update(array(
            'title' => $request->title,
            'title_fa' => $request->title_fa,
            'link' => $request->link,
            'link_fa' => $request->link_fa,
            'image' => $request->images,
            'active' => '1',
        ));
        return redirect('admin/service')->with('message', 'مشخصات با موفقیت ویرایش شد');
    }


    public function skill()
    {

        $text8 = SectionModel::where('id', '13')->first();
        $text9 = SectionModel::where('id', '14')->first();
        $text10 = SectionModel::where('id', '15')->first();
        $text11 = SectionModel::where('id', '16')->first();

        return View('admin.section.skills', [ 'text8' => $text8, 'text9' => $text9, 'text10' => $text10, 'text11' => $text11]);
    }
    public function skill_edit(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }
        SectionModel::where('id', $id)->update(array(
            'title' => $request->title,
            'title_fa' => $request->title_fa,
            'link' => $request->link,
            'link_fa' => $request->link_fa,
            'number' => $request->number,
            'image' => $request->images,
            'active' => '1',
        ));
        return redirect('admin/skill')->with('message', 'مشخصات با موفقیت ویرایش شد');
    }


    public function footer()
    {
        $text = SectionModel::where('id', '17')->first();
        $text2 = SectionModel::where('id', '18')->first();
        $text3 = SectionModel::where('id', '19')->first();
        $text4 = SectionModel::where('id', '20')->first();


        return View('admin.section.footer', ['text' => $text, 'text2' => $text2, 'text3' => $text3 , 'text4' => $text4]);
    }
    public function footer_edit(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }
        SectionModel::where('id', $id)->update(array(
            'title' => $request->title,
            'title_fa' => $request->title_fa,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'active' => '1',
        ));
        return redirect('admin/footer')->with('message', 'مشخصات با موفقیت ویرایش شد');
    }





        public
        function ab_add(Request $request)
        {
            $content = new TeacherModel($request->all());

            if ($request->images !== null) {
                $imageName = time() . '.' . $request->images->getClientOriginalExtension();
                $request->images->move(public_path('teachers-img'), $imageName);
                $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
                $content->images = $FileName;
            }
            $content->save();

            return redirect('admin/teacher')->with('message', 'مشخصات با موفقیت اضافه شد');
        }
        public function ab_edit(Request $request, $id)
        {
            //$re = ContentModel::find($id);
            if ($request->images_u !== null) {
                $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
                $request->images_u->move(public_path('teachers-img'), $imageName);
                $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
                $request->images = $FileName;
            }
            TeacherModel::where('id', $id)->update(array(
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'images' => $request->images,
                'active' => '1',
            ));
            return redirect('admin/teacher')->with('message', 'مشخصات با موفقیت ویرایش شد');
        }
        public function about_destroy($id)
        {
            $delete = TeacherModel::find($id)->delete();
            return redirect('admin/teacher')->with('message', 'مشخصات با موفقیت حذف شد');
        }




    public function manager_index()
    {

        $teachers = ManagerModel::orderby('id', 'desc')->paginate(50);

        return View('admin.section.managers', ['teachers' => $teachers]);
    }


    public function manager_add(Request $request)
    {

        $content = new ManagerModel($request->all());

        if ($request->images !== null) {
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            $request->images->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $content->images = $FileName;
        }

        $content->save();

        return redirect('admin/manager')->with('message', 'مشخصات اعضا با موفقیت اضافه شد');
    }


    public function manager_edit(Request $request, $id)
    {
        //$re = ContentModel::find($id);

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }


        ManagerModel::where('id', $id)->update(array(
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'images' => $request->images,
            'active' => '1',
        ));

        return redirect('admin/manager')->with('message', 'مشخصات اعضا با موفقیت ویرایش شد');

    }

    public function manager_destroy($id)
    {
        $delete = ManagerModel::find($id)->delete();
        return redirect('admin/teacher')->with('message', 'مشخصات اعضا با موفقیت حذف شد');
    }






}