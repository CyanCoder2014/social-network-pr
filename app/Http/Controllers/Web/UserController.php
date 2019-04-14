<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use Auth;
use App\Role;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        // Auth::user()->lastvisitDate = date('m-d-Y H:i:s', time());
        //$user = new User(Auth::user()->lastvisitDate);
        // $user->save();

        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }

    public function index()
    {
        $users = User::where('usertype','!=','Admin')->orderby('id','desc')->paginate(400);
        $roles = Role::select('display_name','id')->get();
        return View('web.admin.user.users',['users'=>$users ,'roles' =>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('display_name','id');
        return View('web.admin.users.create',['roles'=>$roles]);
    }

    public function store(UserRequest $request)
    {
        $new = new User( $request->all() );
        if ( $request->hasFile('imguser') ) {
            $FileName = time().'.'.$request->file('imguser')->getClientOriginalExtension();
            if ( $request->file('imguser')->move( 'assets/imageusers',$FileName ) ) {

                $new->password = bcrypt( $request->password );
                $new->img = $FileName;
                if ( $new->save() ) {
                    return redirect('admin/users');
                }
            }
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $roles = ['0'=>'کاربر مشترک','1'=>'مدیریت'];
        $record = User::find($id);

        return View('web.admin.users.edit',['roles'=>$roles,'record'=>$record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,

        ]);
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);

        User::where('id', $id)->update(array(
            'name'    =>  $request->name,
            'email'    =>  $request->email

        ));
        DB::table('role_user')->where('user_id',$id)->delete();

        if (!empty($request->input('roles')))
            foreach ($request->input('roles') as $key => $value) {
                $user->attachRole($value);
            }

        return redirect(route('user'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find( $id )->delete();
        return redirect('admin/user');
    }
}
