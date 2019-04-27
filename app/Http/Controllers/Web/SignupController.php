<?php

namespace App\Http\Controllers\Web;

use App\Province;
use App\Signup;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SignupController extends Controller
{
    private $price_legal = '5000000';
    private $price_real = '150000';
    public function create(){
        $provinces = Province::all();
        return view('signup.register',compact('provinces'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'national_code' => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'tell' => 'required|string|max:255',
            'city_id' => 'exists:city,id',
            'email_2' => 'required_if:personality,"legal"',
            'national_code_2' => 'required_if:personality,"legal"',
            'post_code_2' => 'required_if:personality,"legal"',
            'mobile_2' => 'required_if:personality,"legal"',
            'tell_2' => 'required_if:personality,"legal"',
            'city_id_2' => 'exists:city,id',
//            'address' => 'string|max:511',


        ]);
        $user = User::where('email',$request->email)->first();
        if($user){
            if(!Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]) )
                return back()->with('message','رمز عبور و ایمیل شما با هم مطابقت ندارد');

        }
        else{
            $user =User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'usertype' => 'Registered',
            ]);
        }

        $transaction = new ArianPalController();
        $transaction->email = $request->email;
        $transaction->mobileNumber = $request->mobile;
        $transaction->paymenter = $request->name;
        $signup = new Signup();
        $signup->active = 0;
        $signup->user_id = $user->id;
        $signup->name = $request->name;
        $signup->email = $request->email;
        $signup->father_name = $request->father;
        if ($request->personality == 'legal'){
            $signup->company = $request->company;
            $signup->company_type = $request->company_type;
        }
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
        $price = ($request->personality == 'real')?$this->price_real:$this->price_legal;
        $transaction->make($price,$signup);
        $signup->transaction_id = $transaction->getId();
        $signup->save();
        if ($request->personality == 'legal' && isset($request->name_2)){
            $signup = new Signup();
            $signup->active = 0;
            $signup->user_id = $user->id;
            $signup->name = $request->name_2;
            $signup->email = $request->email_2;
            $signup->father_name = $request->father_2;
            $signup->national_code = $request->national_code_2;
            $signup->post_code = $request->post_code_2;
            $signup->mobile = $request->mobile_2;
            $signup->tell = $request->tell_2;
            $signup->city_id = $request->city_id_2;
            $signup->address = $request->address_2;
            $signup->recommender = $request->recommender;
            $signup->suggestion = $request->suggestion;
            $signup->gender = ($request->gender_2 == 'f')?0:1;
            $signup->personality = ($request->personality == 'real')?0:1;

            $education = [];
            $education['major']=$request->input('edu_major_2');
            $education['orientation']=$request->input('edu_ori_2');
            $education['year']=$request->input('edu_year_2');
            $education['uni']=$request->input('edu_uni_2');
            $education['grade']=$request->input('edu_grade_2');
            $education['gpa']=$request->input('edu_gpa_2');
            $signup->education = $education;

            $career = [];
            $career['company']=$request->input('current_job_company_2');
            $career['start']=$request->input('current_job_start_2');
            $career['year']=$request->input('current_job_year_2');
            $career['position']=$request->input('current_job_position_2');
            $signup->career = $career;
            $signup->transaction_id = $transaction->getId();

            $signup->save();
        }
//        dd($signup);

        return view('signup.connect',compact('transaction'));
        return redirect('/')->with('message','ثبت نام شما با موفقیت انجام شد');

    }
    public function connect(){
        $transaction = ArianPalController::RetriveTransacton();
        if ($transaction->ready())
            return $transaction->go();
    }
    public function verify(){
        $transaction = ArianPalController::RetriveTransacton();
        if ($transaction->verify())
            return view('signup.verify',compact('transaction'));
    }

}
