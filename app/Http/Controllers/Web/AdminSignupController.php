<?php

namespace App\Http\Controllers\Web;

use App\Province;
use App\Signup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSignupController extends Controller
{
    public function index(){
        $signups = Signup::OrderBy('id','desc')->paginate(10);
        return view('admin.signup.manage',compact('signups'));
    }
    public function edit(Signup $signup){
        $provinces = Province::all();
        return view('admin.signup.edit',compact('signup','provinces'));
    }
    public function update(Request $request, Signup $signup){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'national_code' => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'tell' => 'required|string|max:255',
            'city_id' => 'exists:city,id',
        ]);
        $signup->active = $request->active;
        $signup->name = $request->name;
        $signup->email = $request->email;
        $signup->father_name = $request->father;
        if ($request->personality == 'legal'){
            $signup->company = $request->company;
            $signup->company_type = $request->company_type;
        }
        $signup->status = $request->status;
        $signup->recommender = $request->recommender;
        $signup->suggestion = $request->suggestion;
        $signup->national_code = $request->national_code;
        $signup->post_code = $request->post_code;
        $signup->mobile = $request->mobile;
        $signup->tell = $request->tell;
        $signup->city_id = $request->city_id;
        $signup->address = $request->address;
        $signup->gender = ($request->gender == 'f')?0:1;
        $signup->personality = ($request->personality == 'real')?0:1;

        $education = [];
        $education['major']=$request->input('edu_major');
        $education['orientation']=$request->input('edu_ori');
        $education['year']=$request->input('edu_year');
        $education['uni']=$request->input('edu_uni');
        $education['grade']=$request->input('edu_grade');
        $education['gpa']=$request->input('edu_gpa');
        $signup->education = $education;

        $career = [];
        $career['company']=$request->input('current_job_company');
        $career['start']=$request->input('current_job_start');
        $career['year']=$request->input('current_job_year');
        $career['position']=$request->input('current_job_position');
        $signup->career = $career;
        $signup->save();
        return redirect(route('adminsingnup.index'))->with('message','با موفقیت ویرایش شد');
    }
}
