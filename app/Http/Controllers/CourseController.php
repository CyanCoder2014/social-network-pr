<?php

namespace App\Http\Controllers;

use App\Contents\Course;
use App\Contents\CourseCat;
use App\Contents\CoursePod;
use App\Contents\CourseSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public $post;
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ProfileComplete');
    }


    public function courseCat()
    {
        $cats = CourseCat::where('parent_id', '0')->orderBy('id', 'desc')->get();

        return view('courses.category', compact('cats'));
    }


    public function courseList($catId)
    {
        $courses = Course::where('cat_id', $catId)->paginate(20);
        $cat = CourseCat::find($catId);

        return view('courses.list', compact('courses', 'cat'));
    }


    public function show($id)
    {
        $course = Course::find($id);
        $course->update(array(
            'view' => $course->find($id)->view + 1,
        ));

        return view('courses.show', compact('course'));
    }


    public function manage()
    {
        $this->user = Auth::id();

        $courses = Course::where('users_id', $this->user)->paginate(15);

        $courses_ = Course::paginate(20);

        return view('courses.manage', compact('courses', 'courses_'));
    }


    public function courseCreate()
    {
        $cats = CourseCat::paginate(115);

        return view('courses.create', compact('cats'));
    }


    public function edit($id)
    {

        $course = Course::find($id);

        $cats = CourseCat::where('parent_id', !0)->get();


        return view('courses.edit', compact('course', 'cats'));
    }


    public function update(Request $request, $id)
    {
        $this->user = Auth::id();

        $course = Course::find($id);

        if ($request->image == null) {
            $image = 'default.jpg';
        } else {
            if ($request->image !== null) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('course-img'), $imageName);
                $FileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image = $FileName;
            }
            $image = $request->image;
        }

        $course->update([
            'users_id' => $this->user,
            'cat_id' => $request->cat_id,
            'title' => $request->title,
            'image' => $image,
            'text' => $request->text,
            'state' => $request->state,

        ]);;

        if ($course !== null) {
            $message = 'پست شما با موفقیت ثبت شد';
            $error = null;
        } else {
            $message = 'خطا در ارسال پست';
            $error = '1';
        }
//
//        if ($request->ajax()) {
//            return response()->json(['result' => $result]);
//        }
        return redirect('/home/course/manage/');
    }

    public function courseStore(Request $request)
    {
        $this->user = Auth::id();


        if ($request->text == null) {
            $request->text = $request->title;
        }


        if ($request->image == null) {
            $image = 'default.jpg';
        } else {
            if ($request->image !== null) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('course-img'), $imageName);
                $FileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image = $FileName;
            }
            $image = $request->image;
        }

        $result = Course::create([
            'users_id' => $this->user,
            'cat_id' => $request->cat_id,
            'title' => $request->title,
            'image' => $image,
            'text' => $request->text,
            'state' => $request->state,
        ]);;

        if ($result !== null) {
            $message = 'پست شما با موفقیت ثبت شد';
            $error = null;
        } else {
            $message = 'خطا در ارسال پست';
            $error = '1';
        }
//
//        if ($request->ajax()) {
//            return response()->json(['result' => $result]);
//        }
        return redirect('/home/slide/manage/' . $result->id);

    }


    public function delete($id)
    {
        Course::find($id)->delete();

        return back()->with('message', 'دوره مورد نظر با موفقیت حذف شد');
    }




    public function slideManage($id)
    {
        $course = Course::find($id);
        $slides = CourseSlide::where('courses_id', $id)->get();

        return view('courses.create2', compact('course', 'slides'));
    }


    public function slideStore(Request $request, $id)
    {
        $this->user = Auth::id();


        if ($request->title == null) {
            $title = '-';}else{
            $title = $request->title;}
        if ($request->description == null) {
            $description = '-';}else{
            $description = $request->description;}



        if ($request->effect == '1') {
            $image = $request->image;

        } else {
            if ($request->image == null) {
                $image = 'default.jpg';
            } else {
                if ($request->image !== null) {
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move(public_path('course-slide'), $imageName);
                    $FileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $request->image = $FileName;
                }
                $image = $request->image;
            }
        }


        $result = CourseSlide::create([
            'courses_id' => $id,
            'image' => $description,
            'title' => $title,
            'description' => $image,
            'effect' => $request->effect,
        ]);

        if ($result !== null) {
            $message = 'پست شما با موفقیت ثبت شد';
            $error = null;

        } else {
            $message = 'خطا در ارسال پست';
            $error = '1';
        }

        if ($request->ajax()) {
            return response()->json(['result' => $result]);
        }
        return back()->with('message', 'دوره شما با موفقیت ثبت شد');
    }


    public function slideRemove(Request $request, $id)
    {
        $slide = CourseSlide::where('id', $id);
        $slide->delete();

        if ($request->ajax()) {
            return response()->json(['result' => '1240']);
        }
        return back()->with('message', 'دوره شما با موفقیت ثبت شد');
    }


    public function podManage($id)
    {
        $course = Course::find($id);
        $pods = CoursePod::where('courses_id', $id)->get();

        return view('courses.create3', compact('course', 'pods'));
    }


    public function podStore(Request $request, $id)
    {
        $this->user = Auth::id();

        if ($request->link == null) {
            $image = 'default.mp3';
        } else {
            if ($request->link !== null) {
                $imageName = time() . '.' . $request->link->getClientOriginalExtension();
                $request->link->move(public_path('audio'), $imageName);
                $FileName = time() . '.' . $request->file('link')->getClientOriginalExtension();
                $request->link = $FileName;
            }
            $image = $request->link;
        }

        $result = CoursePod::create([
            'courses_id' => $id,
            'link' => $image,
            'title' => $request->title,
        ]);;

        if ($result !== null) {
            $message = 'پست شما با موفقیت ثبت شد';
            $error = null;

        } else {
            $message = 'خطا در ارسال پست';
            $error = '1';
        }

        $posts[] = $result;
        if ($request->ajax()) {
            return response()->json(['result' => $result]);
        }
        return back()->with('message', 'دوره شما با موفقیت ثبت شد');
    }


    public function podRemove(Request $request, $id)
    {
        $pod = CoursePod::where('id', $id);
        $pod->delete();

        if ($request->ajax()) {
            return response()->json(['result' => '1240']);
        }
        return back()->with('message', 'دوره شما با موفقیت ثبت شد');
    }


    public function forumList($id)
    {
        $cat = ForumCat::where('id', $id)->first();

        return view('forums.list', compact('cat'));
    }


    public function forumMake(Request $request)
    {
        $this->user = Auth::id();
        $content = new Forum($request->all());
        $content->save();

        $request->parent_id = '0';
        $request->forums_id = $content->id;
        $result = $this->post->createByUserId($request, $this->user);

        return back()->with('message', 'تالار مورد نظر با موفقیت ساخته شد');
    }




    public function groupMake($id)
    {

        return view('forums.list', compact('cat'));
    }


    public function groupUpdate($id)
    {

        return view('forums.list', compact('cat'));
    }


    public function groupDelete($id)
    {

        return view('forums.list', compact('cat'));
    }


    public function forum(Request $request, $id)
    {
        $this->user = Auth::id();

        $posts = ForumPost::where('forums_id', $id)->where('ban', '0')->paginate(10);
        //$posts = $this->post->getMainByUserIds($this->user);

        if ($request->ajax()) {
            $view = view('forums.forumdata', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('forums.show', compact('posts'));
    }


    public function forumdata(Request $request)
    {
        $this->user = Auth::id();
        $posts = $this->post->getMainByUserIds($this->user);

        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('forums.forumdata', compact('posts'));
    }


    public function showMore($id)
    {
        $post = $this->post->getEndById($id);
        return view('forums.post', compact('post'));
    }


    public function getComments(Request $request, $postId, $commentsId)
    {
        $comments = $this->post->getMoreComments($postId, $commentsId);
        return view('forums.comments', compact('comments'));
    }


    public function postStore(Request $request)
    {
        $this->user = Auth::id();

        $result = $this->post->createByUserId($request, $this->user);

        if ($result !== null) {
            $message = 'پست شما با موفقیت ثبت شد';
            $error = null;

        } else {
            $message = 'خطا در ارسال پست';
            $error = '1';
        }

        $posts[] = $result;
        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }


        return back()->with('message', 'پست شما با موفقیت ثبت شد');
    }


    public function postUpdate($id, Request $request)
    {
        $post = ForumPost::where('id', $id)->update(array(
            'title' => $request->title,
            'intro' => $request->intro,
            'text' => $request->text,
            'image' => $request->imege,
            'image_b' => $request->imege_b,
        ));
    }


    public function postDelete($id)
    {
        ForumPost::find($id)->delete();
    }


    public function postLike($id)
    {
        $this->user = Auth::id();


        if (UserActivity::where('types_id', '2')->where('users_id', $this->user)->where('targets_id', $id)->first() !== null) {
            $error = '2';
            $message = 'علاقه مندی شما به این پست لغو شد';

            $post = ForumPost::where('id', $id)->update(array(
                'like' => ForumPost::find($id)->like - 1,
            ));
            UserActivity::where('types_id', '2')->where('users_id', $this->user)->where('targets_id', $id)->delete();
        } else {
            $post = ForumPost::where('id', $id)->update(array(
                'like' => ForumPost::find($id)->like + 1,
            ));

            $activity = new UserActivity;
            $activity->types_id = '2';
            $activity->users_id = $this->user;
            $activity->targets_id = $id;
            $activity->save();

            $error = '0';
            $message = 'ok';

        }

        return response()->json(['message' => $message, 'error' => $error, 'result' => ForumPost::find($id)->like]);

    }


    public function postComment(Request $request)
    {
        $this->user = Auth::id();
        $result = $this->post->commentByUserId($request, $request->post_id, $this->user);

        if ($result !== null && $request->intro !== "") {
            $message = 'نظر شما با موفقیت ثبت شد';
            $error = null;
        } else {
            $message = 'خطا در ارسال نظر';
            $error = '1';
        }

        $comments[] = $result;


        if ($request->ajax()) {
            $view = view('comments', compact('comments'))->render();
            return response()->json(['comment' => $view]);
        }

        return response()->json(['message' => $message, 'error' => $error, 'result' => $comments]);
    }


    public function postShare($id)
    {

    }


    public function postBan($id)
    {
        ForumPost::where('id', $id)->update(array(
            'ban' => '1',
        ));
    }


    public function postReport($id)
    {
        $this->user = Auth::id();

        if (UserActivity::where('types_id', '12')->where('users_id', $this->user)->where('targets_id', $id)->first() !== null) {
            $error = '2';
            $message = 'قبلا این پست را ریپورت کرده اید';
        } else {
            $post = ForumPost::where('id', $id)->update(array(
                'report' => ForumPost::find($id)->report + 1,
            ));
            $activity = new UserActivity;
            $activity->types_id = '12';
            $activity->users_id = $this->user;
            $activity->targets_id = $id;
            $activity->save();

            $error = '0';
            $message = 'ok';
        }
        return response()->json(['message' => $message, 'error' => $error, 'result' => ForumPost::find($id)->report]);
    }


    public function commentDelete($id)
    {

    }


    public function commentBan($id)
    {

    }


    public function commentReport($id)
    {

    }


    public function media($id)
    {
        $pods = CoursePod::where('courses_id', $id)->get();

        $media = array();

        $media['DSMusicPlayer']['configuration']['artworkBlur'] = '7px';
        $media['DSMusicPlayer']['configuration']['autoplay'] = 'false';
        $media['DSMusicPlayer']['configuration']['shareButton'] = 'true';
        $media['DSMusicPlayer']['configuration']['muteButton'] = 'true';
        $media['DSMusicPlayer']['configuration']['repeatButton'] = 'true';
        $media['DSMusicPlayer']['configuration']['shuffleButton'] = 'true';

        foreach ($pods as $index => $pod) {
            $media['DSMusicPlayer']['playlist']['track'][$index]['artist'] = Str::words($pod->course->title, $words = 5, $end = '...');
            $media['DSMusicPlayer']['playlist']['track'][$index]['title'] = Str::words($pod->title, $words = 5, $end = '...');
            $media['DSMusicPlayer']['playlist']['track'][$index]['url'] = './../../../audio/' . $pod->link;
            $media['DSMusicPlayer']['playlist']['track'][$index]['artwork'] = '';
            $media['DSMusicPlayer']['playlist']['track'][$index]['apple'] = '';
            $media['DSMusicPlayer']['playlist']['track'][$index]['amazon'] = '';
            $media['DSMusicPlayer']['playlist']['track'][$index]['download'] = 'true';
        }

        return $media;
    }


}
