<?php

namespace App\Http\Controllers;


use App\Contents\Forum;
use App\Contents\ForumCat;
use App\Contents\ForumGroup;
use App\Contents\ForumPost;
use App\Http\Requests\PostRequest;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\EloquentForumRepository;
use App\User;
use App\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Yaml\Tests\A;


class ForumController extends BaseController
{

    public $post;
    public $user;

    public function __construct(ContentRepository $content)
    {
        $this->post = $content;
        //$this->middleware('auth');
    }


    public function forumCat()
    {
        $cats = ForumCat::where('parent_id', '0')->get();

        return view('forums.category', compact('cats'));
    }



    public function forumList($id)
    {
        $cat = ForumCat::where('id',$id)->first();

        return view('forums.list', compact('cat'));
    }

    public function forumListGroup($groupId)
    {
            $cat = ForumGroup::find($groupId);

            $view = view('forums.listdata', compact('cat'))->render();
            return response()->json(['result' => $view]);

    }


    public function forumMake(Request $request)
    {

        if ($request->title == "") {
            $request->title = "نامشخص";
        }
        if ($request->intro == "") {
            $request->intro = $request->title;
        }


        $this->user = Auth::id();
        $content = new Forum($request->all());
        $content->save();

        $request->parent_id = '0';
        $request->forums_id = $content->id;
        $result = $this->post->createByUserId($request, $this->user);

        return back()->with('message', 'تالار مورد نظر با موفقیت ساخته شد');
    }



    public function forumDelete($id)
    {
        Forum::find($id)->delete();

        return back()->with('message', 'تالار مورد نظر با موفقیت حذف شد');
    }



    public function groupMake(Request $request)
    {
        ForumGroup::create([
            'cat_id' => $request->cat_id,
            'title' => $request->title,

        ]);
        return back()->with('message', 'گروه مورد نظر با موفقیت افزوده شد');
    }



    public function groupUpdate(Request $request, $id)
    {
        ForumGroup::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return back()->with('message', 'گروه مورد نظر با موفقیت ویرایش شد');
    }



    public function groupDelete($id)
    {
        ForumGroup::find($id)->delete();

        return back()->with('message', 'گروه مورد نظر با موفقیت حذف شد');
    }



    public function forum(Request $request, $id)
    {
        $this->user = Auth::id();

        $posts = ForumPost::where('forums_id',$id)->where('ban','0')->paginate(10);
        //$posts = $this->post->getMainByUserIds($this->user);

        $forum = Forum::where('id', $id)->update(array(
            'view' => Forum::find($id)->view + 1,
        ));


        $requests = Forum::find($id)->usersReq()->get();

        $forumId = $id;

        if ($request->ajax()) {
            $view = view('forums.forumdata', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('forums.show', compact('posts', 'requests', 'forumId'));
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

        if ($result !== null){
            $message = 'پست شما با موفقیت ثبت شد';
            $error = null;

        }else{
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


        if(UserActivity::where('types_id', '2')->where('users_id', $this->user )->where('targets_id', $id)->first() !== null ){
            $error = '2';
            $message = 'علاقه مندی شما به این پست لغو شد';

            $post = ForumPost::where('id', $id)->update(array(
                'like' => ForumPost::find($id)->like - 1,
            ));
            UserActivity::where('types_id', '2')->where('users_id', $this->user)->where('targets_id', $id)->delete();
        }else {
            $post = ForumPost::where('id', $id)->update(array(
                'like' => ForumPost::find($id)->like + 1,
            ));

            $activity = new UserActivity;
            $activity->types_id = '2';
            $activity->users_id =$this->user ;
            $activity->targets_id = $id;
            $activity->save();

            $error = '0';
            $message = 'ok';

        }

        return response()->json(['message'=>$message , 'error'=>$error , 'result'=>ForumPost::find($id)->like]);

    }



    public function postComment(Request $request)
    {
        $this->user = Auth::id();
            $result = $this->post->commentByUserId($request, $request->post_id, $this->user);

        if ($result !== null && $request->intro !== "" ){
            $message = 'نظر شما با موفقیت ثبت شد';
            $error = null;
        }else{
            $message = 'خطا در ارسال نظر';
            $error = '1';
        }

        $comments[]=$result;


        if ($request->ajax()) {
            $view = view('comments', compact('comments'))->render();
            return response()->json(['comment' => $view]);
        }

        return response()->json(['message'=>$message , 'error'=>$error, 'result'=>$comments]);
    }



    public function postShare($id)
    {

    }



    public function postBan($id)
    {
        ForumPost::where('id', $id)->update(array(
            'ban'    =>  '1',
        ));
    }



    public function postReport($id)
    {
        $this->user = Auth::id();

        if(UserActivity::where('types_id', '12')->where('users_id', $this->user )->where('targets_id', $id)->first() !== null ){
            $error = '2';
            $message = 'قبلا این پست را ریپورت کرده اید';
        }else {
            $post = ForumPost::where('id', $id)->update(array(
                'report'    => ForumPost::find($id)->report+1,
            ));
            $activity = new UserActivity;
            $activity->types_id = '12';
            $activity->users_id =$this->user ;
            $activity->targets_id = $id;
            $activity->save();

            $error = '0';
            $message = 'ok';
        }
        return response()->json(['message'=>$message , 'error'=>$error , 'result'=>ForumPost::find($id)->report]);
    }





    public function editPost($id)
    {
        $post = ForumPost::find($id);;
        return view('forums.edit', compact('post'));
    }


    public function storePost(Request $request, $id)
    {
        $post = ForumPost::find($id);
        $post->intro = $request->intro;
        $post->save();

        if ($request->ajax()) {
            $view = view('post', compact('post'))->render();
            return response()->json(['html' => $view]);
        }

        return view('post', compact('post'));
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






    public function forumReq($id)
    {
        $user = Auth::user();
        $forum = Forum::find($id);

        $user->forumsReq()->save($forum, ['register' => '0']);

        return back()->with('message', 'درخواست شما برای عضویت در این تالار ارسال شد');
    }



    public function forumAccept($id, $userId)
    {
        $user = User::find($userId);
        $user->forumsReq()->updateExistingPivot($id, ['register' => '1']);

        return back()->with('message', 'درخواست عضویت کاربر مورد نظر تایید شد');
    }




}
