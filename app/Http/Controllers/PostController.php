<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Post;
use App\Models\Event;
use App\Models\News;

class PostController extends Controller
{
    public function show(Post $post) {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Post $post) {
        return view('posts/create')->with(['post' => $post]);
    }
    
    public function getData(Event $event, News $news) {
        return view("home")->with(['events'=>$event->get(), 'news'=>$news->get()]);
    }
    
    public function showEvent(Event $event) {
        return view('posts/events/show')->with(['events' => $event]);
    }
    
    public function showNews(News $news) {
        return view('posts/news/show')->with(['news' => $news]);
    }
    
    public function storeEvents(Request $request, Event $event) {
        $input = $request['events'];
        $event->fill($input)->save();
        return redirect('/posts/events/' . $event->id);
    }
    
    public function storeNews(Request $request, News $news) {
        $input = $request['news'];
        $news->fill($input)->save();
        return redirect('/posts/news/' . $news->id);
    }
    
    public function editEvent(Event $event) {
        return view('posts/events/edit')->with(['events' => $event]);
    }
    
    public function editNews(News $news) {
        return view('posts/news/edit')->with(['news' => $news]);
    }
    
    public function updateEvent(EventRequest $request, Event $event) {
        $input_post = $request['events'];
        $event->fill($input_post)->save();
        return redirect('/posts/events/' . $event->id);
    }
    
    public function updateNews(NewsRequest $request, News $news) {
        $input_post = $request['news'];
        $news->fill($input_post)->save();
        return redirect('/posts/news/' . $news->id);
    }

    public function deleteEvent(Event $event) {
        $event->delete();
        return redirect('/home');
    }
    
    public function deleteNews(News $news) {
        $news->delete();
        return redirect('/home');
    }

}
