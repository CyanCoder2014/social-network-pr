<?php

namespace App\Http\Controllers;

use App\Contents\Event;
use App\Contents\EventCat;
use App\Contents\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{



    public function index($id)
    {
        $eventCats = EventCat::paginate(100);
        $events = Event::paginate(20);
        $eventId = $id;

        return view('event.list' , compact('events', 'eventCats', 'eventId'));
    }

    public function getTags()
    {
        $tags = Tag::get()->take(30)->pluck('title');

        return json_encode($tags);
    }






    public function saveTags($tags)
    {

        foreach ($tags as $tag){

        }

    }



}
