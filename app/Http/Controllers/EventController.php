<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;

class EventController extends Controller
{
    // EventとNewsを取得してViewへ渡す関数
    public function getData(Event $event, News $news) {
        return view("home")->with(['events'=>$event->get(), 'news'=>$news->get()]);
    }
}
