<?php

namespace App\Http\Controllers;

use App\ChatConnection;
use App\Contents\Course;
use App\Contents\Event;
use App\Contents\Forum;
use App\Contents\Post;
use App\Contents\PostComment;
use App\Http\Requests\PostRequest;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\EloquentPostRepository;
use App\User;
use App\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Yaml\Tests\A;
use Illuminate\Support\Facades\Notification;



class PostController extends BaseController
{

    public $post;
    public $user;

    public function __construct(ContentRepository $content)
    {
        $this->post = $content;
        $this->middleware('auth');
        $this->middleware('ProfileComplete');
    }


    public function index(Request $request)
    {
        $this->user = Auth::id();
//        Auth::loginUsingId(1);
        $posts = $this->post->getMainByUserIds($this->user);

        $lastCourses = Course::paginate(4);
        $bestCourses = Course::orderBy('view', 'desc')->paginate(4);
        $lastForums = Forum::paginate(4);
        $bestForums = Forum::orderBy('view', 'desc')->paginate(4);

        $userActivities = UserActivity::where('types_id', '1')->orderBy('created_at', 'desc')->paginate(18);

//        $this->authorize('create', Post::class);

//        if (Gate::denies('update-post', $post)) {
//           abort('403', 'ASASASAS');
        $events = Event::paginate(20);

        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('index', compact('posts', 'events', 'lastCourses', 'bestCourses', 'lastForums', 'bestForums', 'userActivities'));
    }


    public function showMore($id)
    {
        $post = $this->post->getEndById($id);
        return view('post', compact('post'));
    }


    public function editPost($id)
    {
        $post = $this->post->getEndById($id);
        return view('edit', compact('post'));
    }


    public function storePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->intro = $request->intro;
        $post->save();

        if ($request->ajax()) {
            $view = view('post', compact('post'))->render();
            return response()->json(['html' => $view]);
        }

        return view('post', compact('post'));
    }


    public function getComments(Request $request, $postId, $commentsId)
    {
        $comments = $this->post->getMoreComments($postId, $commentsId);
        return view('comments', compact('comments'));
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

        //$posts = $this->post->getMainByUserIds($this->user);

        //$posts = Post::where('id', $result->job->id)->get();

        $posts[] = $result;
        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }

        return back()->with('message', 'پست شما با موفقیت ثبت شد');
    }


    public function postUpdate($id, Request $request)
    {
        $post = Post::where('id', $id)->update(array(
            'title' => $request->title,
            'intro' => $request->intro,
            'text' => $request->text,
            'image' => $request->imege,
            'image_b' => $request->imege_b,
        ));
    }


    public function postDelete($id)
    {
        Post::find($id)->delete();
    }


    public function postLike($id)
    {
        $this->user = Auth::id();


        if (UserActivity::where('types_id', '1')->where('users_id', $this->user)->where('targets_id', $id)->first() !== null) {
            $error = '2';
            $message = 'علاقه مندی شما به این پست لغو شد';

            $post = Post::where('id', $id)->update(array(
                'like' => Post::find($id)->like - 1,
            ));
            UserActivity::where('types_id', '1')->where('users_id', $this->user)->where('targets_id', $id)->delete();


        } else {
            $post = Post::where('id', $id)->update(array(
                'like' => Post::find($id)->like + 1,
            ));

            $activity = new UserActivity;
            $activity->types_id = '1';
            $activity->users_id = $this->user;
            $activity->targets_id = $id;
            $activity->save();

            $error = '0';
            $message = 'ok';

            $users = User::where('id', Post::find($id)->users_id)->get();
            Notification::send($users, new \App\Notifications\Event($id, $this->user, 'پسند پست', 'پست شما را پسندید'));


        }

        return response()->json(['message' => $message, 'error' => $error, 'result' => Post::find($id)->like]);
    }


    public function postComment(Request $request)
    {
        $this->user = Auth::id();
        $result = $this->post->commentByUserId($request, $request->post_id, $this->user);

        if ($result !== null && $request->intro !== "") {
            $message = 'نظر شما با موفقیت ثبت شد';
            $error = null;

            $users = User::where('id', Post::find($request->post_id)->users_id)->get();
            Notification::send($users, new \App\Notifications\Event($request->post_id, $this->user, 'نظر روی پست', 'به پست شما نظر داد'));

        } else {
            $message = 'خطا در ارسال نظر';
            $error = '1';
        }

        $comments[] = $result;


        if ($request->ajax()) {
            $view = view('comments', compact('comments'))->render();
            return response()->json(['comment' => $view]);
        }

        return response()->json(['message' => $message, 'error' => $error, 'results' => $comments]);
    }



    public function deleteComment($id)
    {
        $comment = PostComment::find($id);

        $comment->delete();

        return response()->json(['message' => 'deleted', 'error' => '0', 'results' => 'deleted']);
    }











    public function postShare(Request $request,$id)
    {
        if ($request->intro == ""){
            $request->intro = "  ";
        }

        $this->user = Auth::id();
        $content = new Post();

        $result = $content->create([
            'users_id' => $this->user,
            'intro' => $request->intro,
            'comment' => $request->comment,
            'state' => $request->state,

        ]);



        if (Post::find($id)->share !== null){
            $post_ = Post::where('id', $id)->update(array(
                'share' => Post::find($id)->share + 1,
            ));
        }else{
            $post_ = Post::where('id', $id)->update(array(
                'share' => 1,
            ));
        }



        if ($result !== null) {
            $message = 'پست با موفقیت به اشتراک گذاشته شد';
            $error = null;
        } else {
            $message = 'خطا در اشتراک پست';
            $error = '1';
        }

        $posts[] = $result;
        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }

        return back()->with('message', 'پست شما با موفقیت ثبت شد');



    }



















    public function postBan($id)
    {
        Post::where('id', $id)->update(array(
            'ban' => '1',
        ));
    }


    public function postReport($id)
    {
        $this->user = Auth::id();

        if (UserActivity::where('types_id', '11')->where('users_id', $this->user)->where('targets_id', $id)->first() !== null) {
            $error = '2';
            $message = 'قبلا این پست را ریپورت کرده اید';
        } else {
            $post = Post::where('id', $id)->update(array(
                'report' => Post::find($id)->report + 1,
            ));

            $activity = new UserActivity;
            $activity->types_id = '11';
            $activity->users_id = $this->user;
            $activity->targets_id = $id;
            $activity->save();

            $error = '0';
            $message = 'ok';
        }

        return response()->json(['message' => $message, 'error' => $error, 'result' => Post::find($id)->report]);
    }





    public function likeList($id)
    {

        $usersLike = UserActivity::where('types_id', '1')->where('targets_id', $id)->paginate(200);


            $view = view('likes', compact('usersLike'))->render();
            return response()->json(['users' => $view]);

    }


}
