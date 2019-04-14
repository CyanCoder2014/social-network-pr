<?php

namespace App\Http\Controllers\Web;

use App\Web\TicketModel;
use App\Web\TicketReplyModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminTicketController extends Controller
{
    public function __construct()
    {
        // Auth::user()->lastvisitDate = date('m-d-Y H:i:s', time());
        //$user = new User(Auth::user()->lastvisitDate);
        // $user->save();

        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
//        if (Auth::user()->usertype == 'Admin'){
//            $tickets = TicketModel::orderby('id','desc')->paginate(20);
//        }elseif (Auth::user()->usertype == 'General'){
//            $tickets = TicketModel::where('section','gc')->orderby('id','desc')->paginate(20);
//        }elseif (Auth::user()->usertype == 'Translate'){
//            $tickets = TicketModel::where('section','tr')->orderby('id','desc')->paginate(20);
//        }elseif (Auth::user()->usertype == 'Finance'){
//            $tickets = TicketModel::where('section','fi')->orderby('id','desc')->paginate(20);
//        }elseif (Auth::user()->usertype == 'Author'){
//            $tickets = TicketModel::where('section','at')->orderby('id','desc')->paginate(20);
//        }

        $tickets = TicketModel::orderby('id','desc')->paginate(20);


        return View('admin.ticket.sort' , ['tickets'=>$tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('web.admin.ticket.new');
    }



    public function store(Request $request)
    {
        $content = new TicketModel($request->all());
        $content->datetime = date('m-d-Y H:i:s', time());
        $content->user_id= Auth::user()->id;

        $content->save();


        return redirect('admin/ticket')->with('message', 'تیکت شما با موفقیت ارسال شد');
    }


    public function ticket($url)
    {
        //$record = TicketModel::where('id',$url)->first();

        $record = TicketModel::find($url);

        $reply = TicketReplyModel::where('message_id',$url)->get();

        $user = User::find($record->user_id);

        $user_reply = User::orderby('id', 'desc')->paginate(70);

        return View( 'web.admin.ticket.ticket' , ['record'=>$record  ,'reply'=>$reply  ,'user'=>$user  ,'user_reply'=>$user_reply] );
    }

    public function reply(Request $request, $id)
    {
        $reply = new TicketReplyModel($request->all());
        $reply->datetime = date('m-d-Y H:i:s', time());
        $reply->user_id= Auth::user()->id;
        $reply->save();

        $message = new TicketModel($request->all());
        $message::where('id', $id)
            ->update(['state' => 2,'last_login'=>date('m-d-Y H:i:s', time())]);


        return redirect('admin/ticket')->with('message', 'پاسخ شما با موفقیت ارسال شد');
    }

    public function close(Request $request, $id)
    {
        $message = new TicketModel($request->all());
        $message::where('id', $id)
            ->update(['state' => 4]);


        return redirect('admin/ticket')->with('message', 'تیکت شما با موفقیت بسته شد');
    }


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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = TicketModel::find( $id )->delete();
        return redirect('admin/ticket')->with('message', 'تیکت شما با موفقیت حذف شد');
    }


    public function replye( $id )
    {
        $tick = TicketReplyModel::find( $id );
        return View('web.admin.tickets.edit',['tick'=>$tick]);
    }

    public function ansewer( Request $request )
    {
        $tick = TicketReplyModel::find( $request->id_ticket );
        $tick->ansewer = $request->answer;
        $tick->state = '1';
        if ( $tick->update() ) {
            return redirect('admin/ticket');
        }
    }
}
