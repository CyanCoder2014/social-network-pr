<?php

namespace App\Http\Controllers;

use App\Contents\Post;
use App\Contents\PostComment;
use App\Http\Requests\PostRequest;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\EloquentPostRepository;
use App\User;
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
    }



    public function index(Request $request)
    {
        $this->user = Auth::id();
//        Auth::loginUsingId(1);
        $posts = $this->post->getMainByUserIds($this->user);
//        $this->authorize('create', Post::class);

//        if (Gate::denies('update-post', $post)) {
//           abort('403', 'ASASASAS');

        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('index', compact('posts'));
    }



    public function showMore($id)
    {
        $post = $this->post->getEndById($id);
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

        if ($result !== null){
            $message = 'پست شما با موفقیت ثبت شد';
            $error = null;

        }else{
            $message = 'خطا در ارسال پست';
            $error = '1';
        }

        return response()->json(['message'=>$message , 'error'=>$error, 'result'=>$result]);
    }



    public function postUpdate($id, Request $request)
    {
//        $attributes = $request->only(['description']);
//        $this->task->update($id, $attributes);
//
//        return redirect()->route('task.index');

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        if ($validator->passes()) {

            return response()->json(['success'=>'Added new records.']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }



    public function postDelete($id)
    {
        $this->task->delete($id);

        return redirect()->route('task.index');
    }



    public function postLike($id)
    {

        return redirect()->route('task.index');
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

        return response()->json(['message'=>$message , 'error'=>$error, 'result'=>$result]);
    }



    public function postShare($id)
    {

        return redirect()->route('task.index');
    }



    public function postBan($id)
    {

        return redirect()->route('task.index');
    }



    public function postReport($id)
    {

        return redirect()->route('task.index');
    }

}
