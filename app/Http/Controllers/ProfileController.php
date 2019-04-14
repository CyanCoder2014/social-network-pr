<?php

namespace App\Http\Controllers;

use App\ChatConnection;
use App\ChatUserData;
use App\Contents\Post;
use App\User;
use App\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProfileController extends Controller
{


    public $user;


    public function __construct()
    {
        if (Auth::check()){
            $this->middleware('ProfileComplete');
        }

    }


    public function show(Request $request, $userCode)
    {
        $userDetail = explode('-', $userCode);
        $userId = $userDetail[1];
        $user = User::find($userId);

        $posts = Post::where('users_id', $userId)->paginate(5);
        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('profile.show', compact('user', 'posts'));
    }



    public function showPost(Request $request, $userCode, $id)
    {
        $userDetail = explode('-', $userCode);
        $userId = $userDetail[1];
        $user = User::find($userId);

        $notification = Auth::user()->notifications()->where('id', $id)->first();
        $notification->markAsRead();

        $posts = Post::where('id', $notification->data['id'])->paginate(5);



        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('profile.showPost', compact('user', 'posts'));
    }




    public function follow($userCode)
    {
        $id = Auth::id();
        $userFollower = User::find($id);

        $userDetail = explode('-', $userCode);
        $userId = $userDetail[1];
        $userFollowing = User::find($userId);

        if (UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->first() !== null) {
            $error = '2';
            $message = 'همراهی شده لغو شد';

            $userFollower->connections()->where('connections_id', '10')->where('followings_id', $userId)->delete();
            $userFollowing->connections()->where('connections_id', '10')->where('followers_id', $id)->delete();

            UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->delete();
            UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->delete();


            /*
             * For chat user connection
             */
            ChatConnection::where('user_id', $id)->where('connection_id', $userId)->delete();


        } else {
            $connection1 = $userFollower->connections()->create([
                'followings_id' => $userId,
                'connections_id' => '10',
            ]);

            $connection2 = $userFollowing->connections()->create([
                'followers_id' => $id,
                'connections_id' => '10',
            ]);

            $activity = new UserActivity;
            $activity->types_id = '10';
            $activity->users_id = $id;
            $activity->targets_id = $userId;
            $activity->save();

            $activity = new UserActivity;
            $activity->types_id = '10';
            $activity->users_id = $userId;
            $activity->targets_id = $id;
            $activity->save();

            $error = '0';
            $message = 'شما به شبکه همراهان این کاربر پیوستید';


            $users = User::where('id', $userId)->get();
            //Notification::send($users, new \App\Notifications\Event($id, 'همراهی', 'شما را همراهی کرد'));


            /*
             * For chat user connection
             */
            if (UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->first() !== null) {
                $activity = new ChatConnection;
                $activity->user_id = $id;
                $activity->connection_id = $userId;
                $activity->save();

                $activity1 = new ChatConnection;
                $activity1->user_id = $userId;
                $activity1->connection_id = $id;
                $activity1->save();
            }


        }

        return redirect('/home/intro')->with('message', $message);
    }

    public function completeRegister()
    {
        $id = Auth::id();
        $user = User::find($id);
        $posts = Post::where('users_id', $id)->paginate(5);

        return view('profile.register', compact('user', 'posts'));
    }


    public function edit()
    {
        $id = Auth::id();
        $user = User::find($id);
        $posts = Post::where('users_id', $id)->paginate(5);

        return view('profile.edit', compact('user', 'posts'));
    }


    public function profileStore(Request $request)
    {
//        $user = User::find(Auth::id());
//        if ($user !== null) {
//            $user->update(array(
//                'actived' => '1',
//            ));
//        }

        if ($request->mobile == "") {
            $request->mobile = "000";
        }
        if ($request->introduce == "") {
            $request->introduce = "نامشخص";
        }
        if ($request->site == "") {
            $request->site = "نامشخص";
        }
        if ($request->tell == "") {
            $request->tell = "00";
        }
        if ($request->mobile == "") {
            $request->mobile = "00";
        }
        if ($request->name == "") {
            $request->name = "نامشخص";
        }
        if ($request->family == "") {
            $request->family = "نامشخص";
        }
        if ($request->job == "") {
            $request->job = "نامشخص";
        }
        if ($request->education == "") {
            $request->education = "نامشخص";
        }



        if ($request->remove_image == "1") {
            $request->image = "0077.jpg";
        } else {

            if ($request->image_u !== null) {
                $imageName = time() . '.' . $request->image_u->getClientOriginalExtension();
                $request->image_u->move(public_path('user-img'), $imageName);
                $FileName = time() . '.' . $request->file('image_u')->getClientOriginalExtension();
                $request->image = $FileName;
            }
        }

        if ($request->remove_image_b == "1") {
            $request->image_b = "3-sm.jpg";
        } else {
            if ($request->image_ub !== null) {
                $imageName = time() . '.' . $request->image_ub->getClientOriginalExtension();
                $request->image_ub->move(public_path('user-img'), $imageName);
                $FileName = time() . '.' . $request->file('image_ub')->getClientOriginalExtension();
                $request->image_b = $FileName;
            }
        }


        $id = Auth::id();
        $user = User::find($id);

        $information = $user->update([
            'name' => $request->name,
            'family' => $request->family,
            'actived' => '1',
        ]);


        if ($user->profile == null) {
            $profile = $user->profile()->create([
                'users_id' => $id,
                'job' => $request->job,
                'education' => $request->education,
                'tell' => $request->tell,
                'mobile' => $request->mobile,
                'introduce' => $request->introduce,
                'site' => $request->site,
                'image' => $request->image,
                'image_b' => $request->image_b,
            ]);
        } else {
            $profile = $user->profile()->update([
                'job' => $request->job,
                'education' => $request->education,
                'tell' => $request->tell,
                'mobile' => $request->mobile,
                'introduce' => $request->introduce,
                'site' => $request->site,
                'image' => $request->image,
                'image_b' => $request->image_b,
            ]);
        }

        if ($user->social == null) {
            $social = $user->social()->create([
                'users_id' => $id,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'tweeter' => $request->tweeter,
                'google' => $request->google,
                'karamun' => $request->karamun,

            ]);
        } else {
            $social = $user->social()->update([
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'tweeter' => $request->tweeter,
                'google' => $request->google,
                'karamun' => $request->karamun,

            ]);
        }


        $userChat  = ChatUserData::where('id', $id)->first();
        $userChat->update([
            'picname' => $request->image_b,
        ]);


        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


    public function profileComplete(Request $request)
    {
//        $user = User::find(Auth::id());
//        if ($user !== null) {
//            $user->update(array(
//                'actived' => '1',
//            ));
//        }

        if ($request->mobile == "") {
            $request->mobile = "000";
        }
        if ($request->introduce == "") {
            $request->introduce = "نامشخص";
        }
        if ($request->site == "") {
            $request->site = "نامشخص";
        }
        if ($request->tell == "") {
            $request->tell = "00";
        }
        if ($request->mobile == "") {
            $request->mobile = "00";
        }
        if ($request->name == "") {
            $request->name = "نامشخص";
        }
        if ($request->family == "") {
            $request->family = "نامشخص";
        }
        if ($request->job == "") {
            $request->job = "نامشخص";
        }
        if ($request->education == "") {
            $request->education = "نامشخص";
        }


        if ($request->image == "") {
            $request->image = "0077.jpg";
        }
        if ($request->education == "") {
            $request->image_b = "3-sm.jpg";
        }


        $id = Auth::id();
        $user = User::find($id);

        $information = $user->update([
            'name' => $request->name,
            'family' => $request->family,
            'actived' => '1',
        ]);

        if ($user->profile == null) {
            $profile = $user->profile()->create([
                'users_id' => $id,
                'job' => $request->job,
                'education' => $request->education,
                'tell' => $request->tell,
                'mobile' => $request->mobile,
                'introduce' => $request->introduce,
                'site' => $request->site,
                'image' => "0077.jpg",
                'image_b' => "3-sm.jpg",
            ]);
        } else {
            $profile = $user->profile()->update([
                'job' => $request->job,
                'education' => $request->education,
                'tell' => $request->tell,
                'mobile' => $request->mobile,
                'introduce' => $request->introduce,
                'site' => $request->site,
                'image' => "0077.jpg",
                'image_b' => "3-sm.jpg",
            ]);
        }

        $users = User::where('id', $id)->get();
        Notification::send($users, new \App\Notifications\Event('1', '80', 'خوش آمدگویی', 'اطلاعات با موفقیت تکمیل شد'));


        return redirect('/home/intro')->with('message', 'تکمیل مشخصات با موفقیت انجام شد');
    }


    public function deleteFollower($userCode)
    {
        $id = Auth::id();
        $userFollower = User::find($id);

        $userDetail = explode('-', $userCode);
        $userId = $userDetail[1];
        $userFollowing = User::find($userId);

        $userFollower->connections()->where('connections_id', '10')->where('followings_id', $id)->delete();
        $userFollowing->connections()->where('connections_id', '10')->where('followers_id', $userId)->delete();

        UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->delete();
        UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->delete();

        /*
         * For chat user connection
         */
        ChatConnection::where('user_id', $userId)->where('connection_id', $id)->delete();

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function deleteFollowing($userCode)
    {
        $id = Auth::id();
        $userFollower = User::find($id);

        $userDetail = explode('-', $userCode);
        $userId = $userDetail[1];
        $userFollowing = User::find($userId);

        $userFollower->connections()->where('connections_id', '10')->where('followings_id', $userId)->delete();
        $userFollowing->connections()->where('connections_id', '10')->where('followers_id', $id)->delete();

        UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->delete();
        UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->delete();

        /*
         * For chat user connection
         */
        ChatConnection::where('user_id', $id)->where('connection_id', $userId)->delete();

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


    public function addEducation(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $profile = $user->educations()->create([
            'users_id' => $id,
            'title' => $request->title,
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'finish_month' => $request->finish_month,
            'finish_year' => $request->finish_year,
            'major' => $request->major,
            'place' => $request->place,
        ]);

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


    public function editEducation(Request $request, $eduId)
    {
        $id = Auth::id();
        $user = User::find($id);

        $edu = \App\UserEdu::where('id', $eduId)->where('users_id', $id);
        $edu->update([
            'users_id' => $id,
            'title' => $request->title,
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'finish_month' => $request->finish_month,
            'finish_year' => $request->finish_year,
            'major' => $request->major,
            'place' => $request->place,
        ]);

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function deleteEducation($userCode)
    {

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


    public function addWork(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $profile = $user->works()->create([
            'users_id' => $id,
            'title' => $request->title,
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'finish_month' => $request->finish_month,
            'finish_year' => $request->finish_year,
            'major' => $request->major,
            'place' => $request->place,
        ]);

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function editWork(Request $request, $eduId)
    {
        $id = Auth::id();
        $user = User::find($id);

        $edu = \App\UserWork::where('id', $eduId)->where('users_id', $id);
        $edu->update([
            'users_id' => $id,
            'title' => $request->title,
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'finish_month' => $request->finish_month,
            'finish_year' => $request->finish_year,
            'major' => $request->major,
            'place' => $request->place,
        ]);

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function deleteWork($userCode)
    {

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


    public function addArticle(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        if ($request->file !== null) {
            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('article-file'), $imageName);
            $FileName = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file = $FileName;
        }
        if ($request->file == "") {
            $request->file = 'null';
        }

        $profile = $user->articles()->create([
            'users_id' => $id,
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'journal' => $request->journal,
            'link' => $request->link,
            'file' => $request->file,
            'coworker' => $request->coworker,
            'type' => $request->type,
        ]);


        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function editArticle(Request $request, $eduId)
    {
        $id = Auth::id();
        $user = User::find($id);


        if ($request->file_b !== null) {
            $imageName = time() . '.' . $request->file_b->getClientOriginalExtension();
            $request->file_b->move(public_path('article-file'), $imageName);
            $FileName = time() . '.' . $request->file('file_b')->getClientOriginalExtension();
            $request->file = $FileName;
        }
        if ($request->file == "") {
            $request->file = 'null';
        }

        $edu = \App\UserArticle::where('id', $eduId)->where('users_id', $id);
        $edu->update([
            'users_id' => $id,
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'journal' => $request->journal,
            'link' => $request->link,
            'file' => $request->file,
            'coworker' => $request->coworker,
            'type' => $request->type,
        ]);
        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function deleteArticle(Request $request, $eduId)
    {
        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


    public function addSkill(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $profile = $user->skills()->create([
            'users_id' => $id,
            'title' => $request->title,

        ]);


        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function editSkill(Request $request, $eduId)
    {
        $id = Auth::id();
        $user = User::find($id);

        $edu = \App\UserSkill::where('id', $eduId)->where('users_id', $id);
        $edu->update([
            'users_id' => $id,
            'title' => $request->title,

        ]);
        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function deleteSkill(Request $request, $eduId)
    {
        $id = Auth::id();
        $user = User::find($id);

        $edu = \App\UserSkill::where('id', $eduId)->where('users_id', $id);
        $edu->delete();
        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function endorseSkill($eduId)
    {
        $this->user = Auth::id();

        if (UserActivity::where('types_id', '99')->where('users_id', $this->user)->where('targets_id', $eduId)->first() !== null) {
            $error = '2';
            $message = 'تایید شما از این مهارت لغو شد';

            $edu = \App\UserSkill::where('id', $eduId);
            $edu->update([
                'score' => \App\UserSkill::find($eduId)->score - 1,

            ]);
            UserActivity::where('types_id', '99')->where('users_id', $this->user)->where('targets_id', $eduId)->delete();


        } else {


            $edu = \App\UserSkill::where('id', $eduId);
            $edu->update([
                'score' => \App\UserSkill::find($eduId)->score + 1,

            ]);


            $activity = new UserActivity;
            $activity->types_id = '99';
            $activity->users_id = $this->user;
            $activity->targets_id = $eduId;
            $activity->save();

            $error = '0';
            $message = 'ok';


        }

        return response()->json(['message' => $message, 'error' => $error, 'result' => \App\UserSkill::find($eduId)->score]);

    }









    public function endorseList($id)
    {

        $usersLike = UserActivity::where('types_id', '99')->where('targets_id', $id)->paginate(200);


        $view = view('likes', compact('usersLike'))->render();
        return response()->json(['users' => $view]);

    }






    public function editAbout(Request $request, $eduId)
    {
        $id = Auth::id();
        $user = User::find($id);

        $profile = $user->profile()->update([
            'intro' => $request->intro,
        ]);

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


    public function deleteForum($userCode)
    {

        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }


}
