<?php

namespace App\Http\Controllers\Web;

use App\Web\CommentModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function __construct()
    {
    }

    public function send(Request $request)
    {
        $comments = new CommentModel($request->all());
        $comments->date = date('m-d-Y H:i:s', time());
        if (Auth::check()) {
            $comments->userid = Auth::user()->id;
        }
        $comments->userid = '0';

        $comments->save();

        return redirect()->back()->with('message', 'نظر شما با موفقیت ثبت شد');
    }


    public function reply(Request $request)
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');


        $content = new CommentModel($request->all());
        $content->userid = Auth::user()->id;
        $content->name = Auth::user()->name;
        $content->date = date('m-d-Y H:i:s');
        $content->published = 1;

        $content->save();

        return redirect()->back()->with('جواب شما ثبت شد');
    }


    public function index()
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');

        //$id = Auth::user()->id;
        $comments = CommentModel::orderby('id', 'desc')->paginate(100);

        return View('web.admin.comment.comments', ['comments' => $comments]);
    }


    public function store(Request $request)
    {
        $content = new CommentModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());
        $content->user_id = Auth::user()->id;

        $content->save();

        return redirect('comments');
    }

    public function accept($id)
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');

        CommentModel::where('id', $id)->update(array(
            'published' => '1',
        ));
        return redirect('/admin/comment');
    }

    public function deny($id)
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');
        CommentModel::where('id', $id)->update(array(
            'published' => '0',
        ));
        return redirect('/admin/comment');
    }

    public function destroy($id)
    {
        $delete = CommentModel::find($id)->delete();
        return redirect('/admin/comment');
    }


}