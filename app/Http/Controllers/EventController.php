<?php

namespace App\Http\Controllers;

use App\Contents\Event;
use App\Contents\EventCat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{



    public function index($id)
    {
        $eventCats = EventCat::paginate(100);
        $events = Event::paginate(20);
        $eventId = $id;

        return view('event.list' , compact('events', 'eventCats', 'eventId'));
    }
    public function cat()
    {
        $eventCats = EventCat::paginate(100);
        $events = Event::paginate(30);
        $eventId = '0';

        return view('event.list' , compact('events', 'eventCats', 'eventId'));

    }
    public function inform()
    {

    }



    public function manageList()
    {
        $events = Event::paginate(25);
        $eventCats = EventCat::paginate(100);

        return view('event.add' , compact('events', 'eventCats'));
    }


    public function add(Request $request)
    {

        $id = Auth::id();
        $event = new Event();

        if ($request->image !== null) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('event-img'), $imageName);
            $FileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image = $FileName;
        }


        $event->create([
            'users_id' => $id,
            'title' => $request->title,
            'place' => $request->place,
            'cat_id' => $request->cat_id,
            'start' => $request->start,
            'finish' => $request->finish,
            'image' => $request->image,
            'description' => $request->description,
        ]);
        return back()->with('message', 'رویداد با موفقیت منتشر شد');
    }


    public function edit(Request $request, $eventId)
    {
        $id = Auth::id();
        $event = Event::find($eventId);

        if ($request->image_u !== null) {
            $imageName = time() . '.' . $request->image_u->getClientOriginalExtension();
            $request->image_u->move(public_path('event-img'), $imageName);
            $FileName = time() . '.' . $request->file('image_u')->getClientOriginalExtension();
            $request->image = $FileName;
        }
        $event->update([
            'users_id' => $id,
            'title' => $request->title,
            'cat_id' => $request->cat_id,
            'place' => $request->place,
            'start' => $request->start,
            'finish' => $request->finish,
            'image' => $request->image,
            'description' => $request->description,
        ]);
        return back()->with('message', 'تغییرات با موفقیت انجام شد');
    }

    public function delete($id)
    {
        $delete = Event::find($id)->delete();

        return back()->with('message', 'رویداد حذف شد');
    }



}
