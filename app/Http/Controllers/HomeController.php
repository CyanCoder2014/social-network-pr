<?php

namespace App\Http\Controllers;

use App\Contents\Content;
use App\Contents\Course;
use App\Contents\Event;
use App\Contents\Forum;
use App\Contents\ForumCat;
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


class HomeController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $post;
    public $user;


    public function __construct(ContentRepository $content)
    {
        $this->post = $content;
            $this->middleware('ProfileComplete');

    }





    public function index(Request $request)
    {
        $this->user = Auth::id();
//        Auth::loginUsingId(1);
        $posts = $this->post->getMainByUserIds($this->user);

        $lastCourses = Course::paginate(4);
        $bestCourses = Course::orderBy('view', 'desc')->paginate(4);
        $lastForums = Forum::paginate(5);
        $bestForums = Forum::orderBy('view', 'desc')->paginate(5);

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




    public function indexss(Request $request)
    {

        $posts = Post::where('news', '1')->paginate(4);


        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('general', compact('posts'));

    }








    public function search(Request $request)
    {
        //$posts = Post::where('intro', 'LIKE', '%' . $request->input . '%')->orderby('id','desc')->paginate(2);
        $users = User::where('username', 'LIKE', '%' . $request->input . '%')->orwhere('name', 'LIKE', '%' . $request->input . '%')->orwhere('family', 'LIKE', '%' . $request->input . '%')->orderby('id','desc')->paginate(3);
        $forums = Forum::where('title', 'LIKE', '%' . $request->input . '%')->orderby('id','desc')->paginate(2);
        $forumCats = ForumCat::where('title', 'LIKE', '%' . $request->input . '%')->orderby('id','desc')->paginate(2);

        if ($request->ajax()) {
            $view = view('search.search', compact('users', 'forums', 'forumCats'))->render();
            return response()->json(['result' => $view]);
        }
        return view('search.search', compact('users', 'forums', 'forumCats'));
    }






    public function page($id)
    {

        $content = Content::find($id);

        return view('pages.single', compact('content'));
    }


}
