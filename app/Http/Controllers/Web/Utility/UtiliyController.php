<?php

namespace App\Http\Controllers\Web\Utility;

use Illuminate\Http\Request;
use App\Web\Utility;
use App\Http\Controllers\Controller;


class UtiliyController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $types;
    private $names;

    private $form ;

    private $is_addable;


    function __construct()
    {
        $this->types= config('utility.types');
        $this->names= config('utility.names');
        $this->form= config('utility.forms');
        $this->is_addable= config('utility.addable');

    }

    public function get_utilities()
    {
        return $this->names;
    }

    public function index($type)
    {


        if(in_array($type,$this->types))
        {
            $content=Utility::where('type',$type)->paginate(500);
            return View('web.admin.utility.utilities', ['content' => $content,'type' => $type,'names' => $this->names,'form' => $this->form[$type]]);
        }
        return abort(404);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$name)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$type)
    {
        if(in_array($type,$this->types)) {
            $this->validate($request, array(
                'title_a' => 'required'
            ));
            $about = new Utility();
            if ($request->input('active') == "true")
                $about->active = true;
            else
                $about->active = false;
            $about->type = $type;
            $about->title = $request->input('title_a');


            $data = array();
            foreach ($this->form[$type] as $key => $value)
            {
                $data[$key]=$request->input($key);
                if($value['type']=='file'){
                    if ($request->hasFile($key)) {
                        $image = $request->file($key);
                        $filename = time() . '.' . $image->getClientOriginalExtension();
                        $path = public_path('images/');
                        $image->move($path, $filename);
                        $data[$key] = 'images/' . $filename;


                    }
                }
            }



            $about->data = $data;
            $about->save();

            return redirect()->route('utility.index',['name' => $type])
                ->with('success', 'ساخته شد');
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$type, $id)
    {
        if(in_array($type,$this->types)) {
            $this->validate($request, array(
                'title_a' => 'required'

            ));
            $about = Utility::find($id);
            $about->title = $request->input('title_a');
            if ($request->input('active') == "true")
                $about->active = true;
            else
                $about->active = false;

            $data = array();

            foreach ($this->form[$type] as $key => $value)
            {
                $data[$key]=$request->input($key);
                if($value['type']=='file'){
                    if ($request->hasFile($key)) {
                        $image = $request->file($key);
                        $filename = time() . '.' . $image->getClientOriginalExtension();
                        $path = public_path('images/');
                        $image->move($path, $filename);
                        $data[$key] = 'images/' . $filename;


                    }
                    elseif (isset($about->data[$key]))
                        $data[$key] = $about->data[$key];
                }
            }
            $about->data = $data;
            $about->save();

            return redirect()->route('utility.index',['name' => $type])
                ->with('success', 'به روز رسانی انجام شد');
        }
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type,$id)
    {

        if(in_array($type,$this->types)) {
            Utility::destroy($id);
            return redirect()->route('utility.index',['name' => $type])
                ->with('success', 'با موفقیت حذف شد');
        }
        return abort(404);
    }
}
