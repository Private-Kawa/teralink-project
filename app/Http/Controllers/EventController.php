<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function viewEvent(Event $event) {
        return view("home")->with(['events'=>$event->get()]);
    }
}
