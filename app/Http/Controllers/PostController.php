<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Post;
use App\Models\Event;
use App\Models\News;
use App\Models\EventsImages;
use App\Models\NewsImages;
use JD\Cloudder\Facades\Cloudder;
use Cloudinary;

class PostController extends Controller
{
    public function getData(Event $event, News $news) {
        return view("home")->with(['events'=>$event->orderBy('date', 'asc')->get(), 'news'=>$news->orderBy('date', 'asc')->get()]);
    }

    public function create(Post $post) {
        return view('posts/create')->with(['post' => $post]);
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
        
        $images = $request->file('images');
        // cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        if(isset($images)) {
            foreach($images as $img) {   
                $events_images = new EventsImages(); //インスタンス作成 imagetableに画像を入れるためにインスタンスを作る cloudinaryから帰ってきたurlを保存する場所がprofとは異なる
                $upload_url = Cloudinary::upload($img->getRealPath())->getSecurePath(); //$upload_urlにcloudinaryのpathが入ってる
                $events_images->path = $upload_url;
                $events_images->event_id = $event->id;
                $events_images->save();
            }
        }
        return redirect('/posts/events/' . $event->id);
    }
    
    public function storeNews(Request $request, News $news) {
        $input = $request['news'];
        $news->fill($input)->save();
        
        $images = $request->file('images');
        if(isset($images)) {
            foreach($images as $img) {   
                $news_images = new NewsImages();
                $upload_url = Cloudinary::upload($img->getRealPath())->getSecurePath();
                $news_images->path = $upload_url;
                $news_images->news_id = $news->id;
                $news_images->save();
            }
        }
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
