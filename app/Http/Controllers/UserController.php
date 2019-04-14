<?php

namespace App\Http\Controllers;

use App\ChatConnection;
use App\ChatUserData;
use App\Contents\Course;
use App\Contents\CourseComment;
use App\Contents\Event;
use App\Contents\File;
use App\Contents\Forum;
use App\Contents\ForumCat;
use App\Contents\ForumComment;
use App\Contents\ForumPost;
use App\Contents\Post;
use App\Contents\PostComment;
use App\Role;
use App\User;
use App\UserActivity;
use App\UserEdu;
use App\UserProfile;
use App\UserSkill;
use App\UserWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
            $this->middleware('auth');
            $this->middleware('UserMiddleware');
    }



    public function index()
    {
        $users = User::where('state', !99)->orderby('id','desc')->paginate(25);
        $roles = Role::orderby('id','desc')->get();
        $cats12 = ForumCat::where('parent_id', '0')->get();
        return View('admin.user.list',['users'=>$users, 'roles'=>$roles, 'cats12'=>$cats12]);
    }



    public function update(Request $request, $id)
    {
        $user_ = User::find($id);

        $user_->roles()->detach(2);
        $user_->roles()->detach(3);

        $user = User::find($id);

        $role = \App\Role::find($request->role);

        $role->user()->save($user);
        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }



    public function active($id)
    {
        User::where('id', $id)->update(array(
            //'actived'    =>  '1',
            'network'    =>  '1',
        ));

        $user = User::find($id);
        $role = \App\Role::find(4);
        $role->user()->save($user);
        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }



    public function ban($id)
    {
        User::where('id', $id)->update(array(
            'state'    =>  '2',
        ));
        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }



    public function ok($id)
    {
        User::where('id', $id)->update(array(
            'state'    =>  '0',
        ));
        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }



    public function delete($id)
    {
        $delete = Post::where('users_id', $id)->delete();
        $delete = PostComment::where('users_id', $id)->delete();
        $delete = Forum::where('users_id', $id)->delete();
        $delete = ForumPost::where('users_id', $id)->delete();
        $delete = ForumComment::where('users_id', $id)->delete();
        $delete = File::where('users_id', $id)->delete();
        $delete = Course::where('users_id', $id)->delete();
        $delete = CourseComment::where('users_id', $id)->delete();
        $delete = Event::where('users_id', $id)->delete();
        $delete = UserProfile::where('users_id', $id)->delete();
        $delete = UserSkill::where('users_id', $id)->delete();
        $delete = UserWork::where('users_id', $id)->delete();
        $delete = UserActivity::where('users_id', $id)->delete();
        $delete = UserEdu::where('users_id', $id)->delete();
        $delete = ChatUserData::where('id', $id)->delete();
        $delete = ChatConnection::where('user_id', $id)->delete();

        $delete = User::find( $id )->delete();


//        User::where('id', $id)->update(array(
//            //'actived'    =>  '1',
//            'state'    =>  '99',
//        ));

        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }




    public function addForumCat(Request $request, $id)
    {
        $user = User::find($id);
        $forumCat = \App\Contents\ForumCat::find($request->cat_id);
        $forumCat->users()->save($user);

        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }




    public function removeForumCat($id, $cat)
    {
        $user = User::find($id);
        $forumCat = \App\Contents\ForumCat::find($cat);
        $forumCat->users()->detach($user);

        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }

    public function notify($id, $cat)
    {


    }




}
