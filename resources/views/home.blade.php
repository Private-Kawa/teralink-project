<x-app-layout>
    @if(Auth::user()->is_admin === 0 )
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
    @else
        <h1 class="text-2xl pb-3">あなたの予定 -管理者画面-</h1>
        <section>
            <div class="flex items-center">
                <h2 class="text-xl py-3">すべてのイベント</h2>
                <a href='/posts/create'>
                    <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">イベント新規追加</button>
                </a>
            </div>
            <ul class='pb-6'>
            @foreach ($events as $event)
                <li class='mb-2 p-2 rounded border-2 border-solid border-gray-200'>
                    <h3 class='title text-lg'>{{ $event->title }}</h2>
                    <h3 class='date'>日程：{{ $event->date }}</h2>
                    <p class='capacity'>定員：{{ $event->capacity }}</p>
                    <p class='content'>{{ $event->content }}</p>
                    <a href='/posts/events/{{ $event->id }}'>
                        <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">詳細</button>
                    </a>
                </li>
            @endforeach
            </ul>
            <div class="flex items-center">
                <h2 class="text-xl py-3">すべてのニュース</h2>
                <a href='/posts/create'>
                    <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">ニュース新規追加</button>
                </a>
            </div>
            <ul class='pb-6'>
            @foreach ($news as $news_item)
                <li class='mb-2 p-2 rounded border-2 border-solid border-gray-200'>
                    <h3 class='title text-lg'>{{ $news_item->title }}</h2>
                    <h3 class='date'>日程：{{ $news_item->date }}</h2>
                    <p class='content'>{{ $news_item->content }}</p>
                    <a href='posts/news/{{ $news_item->id }}'>
                        <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-4 py-1 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-700">詳細</button>
                    </a>
                </li>
            @endforeach
            </ul>
        </section>
    @endif
    
    
</x-app-layout>