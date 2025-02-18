<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Merch;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {

        $events = Event::latest()->take(3)->get();
        $merchs = Merch::latest()->take(3)->get();
        
        return view('homepage', [
            'events' => $events,
            'merchs' => $merchs
        ]);
    }
    
    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->get();
        
        return view('events.events', [
            'event' => $event
        ]);
    }
    
}
