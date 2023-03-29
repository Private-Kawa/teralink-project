<x-app-layout>
    @if(Auth::user()->id !==  1 )
        <h1 class="text-2xl pb-3">あなたの予定</h1>
        <section>
            <h2 class="text-xl py-3">イベント一覧</h2>
            <ul class='pb-6'>
            @foreach ($events as $event)
                <li class='mb-2 p-2 rounded border-2 border-solid border-gray-200'>
                    <h3 class='title text-lg'>{{ $event->title }}</h2>
                    <h3 class='date'>日程：{{ $event->date }}</h2>
                    <p class='capacity'>定員：{{ $event->capacity }}</p>
                    <p class='content'>{{ $event->content }}</p>
                </li>
            @endforeach
            </ul>
            <h2 class="text-xl py-3">ニュース一覧</h2>
            <ul class='pb-6'>
            @foreach ($news as $news_item)
                <li class='mb-2 p-2 rounded border-2 border-solid border-gray-200'>
                    <h3 class='title text-lg'>{{ $news_item->title }}</h2>
                    <h3 class='date'>日程：{{ $news_item->date }}</h2>
                    <p class='content'>{{ $news_item->content }}</p>
                </li>
            @endforeach
            </ul>
        </section>
    @elseif (Auth::user()->is_admin ===  1)
        <h1 class="text-2xl pb-3">あなたの予定 -管理者画面-</h1>
        <a href='/posts/create'>
            <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">記事新規追加</button>
        </a>
        <section>
            <div class="flex items-center">
                <h2 class="text-xl py-3">すべてのイベント</h2>
            </div>
            <ul class='pb-6'>
            @foreach ($events as $event)
                <li class='mb-2 p-2 rounded border-2 border-solid border-gray-200'>
                    <div class="flex my-3">
                        <h3 class='title text-lg'>{{ $event->title }}</h3>
                        <a href='/posts/events/{{ $event->id }}'>
                            <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">詳細</button>
                        </a>
                        <form action="/posts/events/{{ $event->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-red-700 dark:hover:bg-red-800 focus:outline-none dark:focus:ring-red-700">削除</button>
                        </form>
                    </div>
                    <h3 class='date'>日程：{{ $event->date }}</h3>
                    <p class='capacity'>定員：{{ $event->capacity }}</p>
                    <p class='content'>{{ $event->content }}</p>
                </li>
            @endforeach
            </ul>
            <div class="flex items-center">
                <h2 class="text-xl py-3">すべてのニュース</h2>
            </div>
            <ul class='pb-6'>
            @foreach ($news as $news_item)
                <li class='mb-2 p-2 rounded border-2 border-solid border-gray-200'>
                    <div class="flex my-3">
                        <h3 class='title text-lg'>{{ $news_item->title }}</h3>
                        <a href='posts/news/{{ $news_item->id }}'>
                            <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">詳細</button>
                        </a>
                        <form action="/posts/news/{{ $news_item->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-red-700 dark:hover:bg-red-800 focus:outline-none dark:focus:ring-red-700">削除</button>
                        </form>
                    </div>
                    <h3 class='date'>日程：{{ $news_item->date }}</h3>
                    <p class='content'>{{ $news_item->content }}</p>
                </li>
            @endforeach
            </ul>
        </section>
    @endif
    
    
</x-app-layout>