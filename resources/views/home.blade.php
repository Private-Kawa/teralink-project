<x-app-layout>
    <!-- ユーザー -->
    @if(Auth::user()->id !==  1)
        <section>
            <h1 class="text-2xl mb-3">寺院の予定</h1>
            <p class="mb-3 text-gray-800 dark:text-gray-300">お寺の行事やニュースを一覧で表示しています。</p>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">仏事・行事の予定</h2>
            <ul class='mb-5 flex flex-row flex-wrap gap-2'>
            @foreach ($events as $event)
                <li class="w-full md:w-[calc(50%_-_0.5rem)]  lg:w-[calc(33%_-_0.5rem)] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($event->events_images as $event_image)
                        <img class="rounded-t-lg w-full h-52 object-cover" src="{{$event_image->path}}" alt="画像準備中" />
                    @endforeach
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $event->title }}</h3>
                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">{{ $event->date }}</p>
                        <p class="mb-3 font-normal">{{ $event->content }}</p>
                        <a href='/posts/events/{{ $event->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            詳細
                        </a>
                    </div>
                </li>
            @endforeach
            </ul>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">ニュース</h2>
            <ul class='mb-5 flex flex-row flex-wrap gap-2'>
            @foreach ($news as $news_item)
                <li class="w-full md:w-[calc(50%_-_0.5rem)]  lg:w-[calc(33%_-_0.5rem)] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($news_item->news_images as $news_image)
                        <img class="rounded-t-lg w-full h-52 object-cover" src="{{$news_image->path}}" alt="画像準備中" />
                    @endforeach
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $news_item->title }}</h3>
                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">{{ $news_item->date }}</p>
                        <p class="mb-3 font-normal">{{ $news_item->content }}</p>
                        <a href='/posts/news/{{ $news_item->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            詳細
                        </a>
                    </div>
                </li>
            @endforeach
            </ul>
        </section>
    <!-- 管理者 -->
    @else
        <section>
            <h1 class="text-2xl mb-3">寺院の予定 -管理者画面-</h1>
            <a class="block mb-3" href='/posts/create'>
                <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">記事新規追加</button>
            </a>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">仏事・行事の予定</h2>
            <ul class='mb-5 flex flex-row flex-wrap gap-2'>
            @foreach ($events as $event)
          
                 <li class="w-full md:w-[calc(50%_-_0.5rem)]  lg:w-[calc(33%_-_0.5rem)] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($event->events_images as $event_image)
                        <img class="rounded-t-lg w-full h-52 object-cover" src="{{$event_image->path}}" alt="画像準備中" />
                    @endforeach
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $event->title }}</h3>
                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">{{ $event->date }}</p>
                        <p class="mb-3 font-normal">{{ $event->content }}</p>
                        <div class="flex gap-3">
                            <a href='/posts/events/{{ $event->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                詳細
                            </a>
                            <form action="/posts/events/{{ $event->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">削除</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
            <h2 class="text-xl mb-3 pb-1 border-b-2 border-gray-200 dark:border-gray-600">ニュース</h2>
            <ul class='mb-5 flex flex-row flex-wrap gap-2'>
                
                
            @foreach ($news as $news_item)
                <li class="w-full md:w-[calc(50%_-_0.5rem)]  lg:w-[calc(33%_-_0.5rem)] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($news_item->news_images as $news_image)
                        <img class="rounded-t-lg w-full h-52 object-cover" src="{{$news_image->path}}" alt="画像準備中" />
                    @endforeach
                    <div class="p-3">
                        <h3 class="mb-1 text-2xl tracking-tight text-gray-900 dark:text-white">{{ $news_item->title }}</h3>
                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">{{ $news_item->date }}</p>
                        <p class="mb-3 font-normal">{{ $news_item->content }}</p>
                        <div class="flex gap-3">
                            <a href='/posts/news/{{ $news_item->id }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                詳細
                            </a>
                            <form action="/posts/news/{{ $news_item->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">削除</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </section>
    @endif
    <button type="button" class="scroll_top fixed right-2 bottom-2 text-gray-700 border border-gray-700 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-gray-200 dark:text-white dark:hover:text-white dark:focus:ring-gray-800 dark:hover:bg-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M12 4l0 10" />
          <path d="M12 4l4 4" />
          <path d="M12 4l-4 4" />
          <path d="M4 20l16 0" />
        </svg>
        <span class="sr-only">Icon description</span>
    </button>
</x-app-layout>

<script>
    const scrollBtn = $('.scroll_top');

    $(window).on('load scroll', ()=>{
        let currentPosY  = window.pageYOffset;
        if (currentPosY > 100) {
             scrollBtn.removeClass('hidden');
             scrollBtn.addClass('block');
        } else {
             scrollBtn.removeClass('block');
             scrollBtn.addClass('hidden');
        }
    });
    
    $(scrollBtn).on('click', () => {
        window.scroll({
            top: 0,
            behavior: "smooth",
        });
    });
    
</script>