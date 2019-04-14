<?php

namespace App\Http\Controllers\Web;

use App\Web\Delegate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDelegateController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');

    }


    public function index()
    {

        $contents = Delegate::orderby('id', 'desc')->paginate(10);



        return View('admin.delegates.sort', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View('admin.delegates.add');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'name_fa'=>'required',
            'address'=>'required',
            'address_fa'=>'required',
            'tel'=>'required',
            'lng'=>'required',
            'lat'=>'required',
        ]);

        $content = new Delegate();
        $content->tel = $request->input('tel');
        $content->lng = $request->input('lng');
        $content->lat = $request->input('lat');
        $name=[];
        $address=[];
        $address['en'] = $request->input('address');
        $address['fa'] = $request->input('address_fa');
        $name['fa'] = $request->input('name_fa');
        $name['en'] = $request->input('name');
        $content->name = $name;
        $content->address = $address;
        $content->save();

        return redirect(route('delegate'))->with('message', 'نمایندگی با موفقیت اضافه شد');
    }

    public function edit($id)
    {

        $record = Delegate::find($id);
        return View('admin.delegates.edit', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'name_fa'=>'required',
            'address'=>'required',
            'address_fa'=>'required',
            'tel'=>'required',
            'lng'=>'required',
            'lat'=>'required',
        ]);

        $content = Delegate::find($id);
        $content->tel = $request->input('tel');
        $content->lng = $request->input('lng');
        $content->lat = $request->input('lat');
        $name=[];
        $address=[];
        $address['en'] = $request->input('address');
        $address['fa'] = $request->input('address_fa');
        $name['fa'] = $request->input('name_fa');
        $name['en'] = $request->input('name');
        $content->name = $name;
        $content->address = $address;
        $content->save();

        return redirect(route('delegate'))->with('message', 'نمایندگی با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        Delegate::destroy($id);
        return redirect(route('delegate'))->with('message', 'نمایندگی با موفقیت  حذف شد');
    }
}
